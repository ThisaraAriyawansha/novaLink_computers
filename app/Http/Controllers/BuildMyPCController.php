<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

use Mail;
use Exception;
use Illuminate\Support\Facades\Log;

class BuildMyPCController extends Controller
{

public function mainbuildMyPC()
{
    $pcTypes = [
        'PROCESSOR', 'MOTHERBOARD', 'RAM', 'GRAPHIC CARDS',
        'STORAGE & NAS', 'SSD NVME', 'HARD DISK',
        'POWER SUPPLY', 'CASINGS', 'COOLING & LIGHTING', 'FANS',
        'MONITORS & ACCESSORIES',
    ];

    $products = Product::with(['features'])
        ->where('status_id', 1)
        ->whereIn('type', $pcTypes)
        ->get()
        ->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'type' => $product->type,
                'tags' => $product->tags,
                'desc' => $product->description,
                'dis_price' => $product->discounted_price,
                'ret_price' => $product->retail_price,
                'features' => $product->features->pluck('feature_value', 'feature_name')->toArray(),
                'warranty' => $product->warranty,
                'in_stock' => $product->in_stock,
                'image' => asset($product->image),
            ];
        });

    // Define PC build categories based on your product categories
    $pcBuildCategories = [
        ['name' => 'Processors', 'value' => 'PROCESSOR', 'icon' => 'fas fa-microchip'],
        ['name' => 'Motherboards', 'value' => 'MOTHERBOARD', 'icon' => 'fas fa-memory'],
        ['name' => 'RAM', 'value' => 'RAM', 'icon' => 'fas fa-memory'],
        ['name' => 'Graphics Cards', 'value' => 'GRAPHIC CARDS', 'icon' => 'fas fa-tv'],
        ['name' => 'STORAGE & NAS', 'value' => 'STORAGE & NAS', 'icon' => 'fas fa-hdd'],
        ['name' => 'Power Supply', 'value' => 'POWER SUPPLY', 'icon' => 'fas fa-plug'],
        ['name' => 'PC Cases', 'value' => 'CASINGS', 'icon' => 'fas fa-cube'],
        ['name' => 'COOLING & LIGHTING', 'value' => 'COOLING & LIGHTING', 'icon' => 'fas fa-fan'],
        ['name' => 'MONITORS & ACCESSORIES', 'value' => 'MONITORS & ACCESSORIES', 'icon' => 'fas fa-desktop'],
    ];

    return view('buildMyPC', [
        'products' => $products,
        'pcBuildCategories' => $pcBuildCategories
    ]);
}


    public function buildMyPC()
    {
        return view('animation');
    }

    public function proxyPredict(Request $request)
    {
        try {
            $response = Http::timeout(10)->post('http://localhost:5000/predict', $request->only([
                'job', 'activity', 'software', 'workload', 'hours', 'multiApp', 'budget', 'fileSize'
            ]));

            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Python server unavailable'], 503);
        }
    }



    public function sendInvoiceEmail(Request $request)
    {
        try {
            // Log incoming request for debugging
            Log::info('Invoice Email Request', $request->all());
            
            // Validate request data
            $validated = $request->validate([
                'customerName' => 'required',
                'customerEmail' => 'required|email',
                'customerPhone' => 'required',
                'customerAddress' => 'required',
                'invoiceItems' => 'required|array',
                'subtotal' => 'required',
                'tax' => 'required',
                'total' => 'required',
                'invoiceNumber' => 'required',
                'dateIssued' => 'required',
                'dueDate' => 'required',
            ]);

            // Generate PDF
            $data = $request->all();
            
            // Make sure the view exists
            if (!view()->exists('invoices.pdf')) {
                throw new Exception('PDF template view not found');
            }
            
            $pdf = PDF::loadView('invoices.pdf', compact('data'));
            $pdfContent = $pdf->output();
            
            // Send email to admin
            Mail::send('emails.invoice', $data, function($message) use ($pdfContent, $data) {
                $message->to(env('ADMIN_EMAIL'))
                    ->subject('New Invoice Generated - ' . $data['invoiceNumber'])
                    ->attachData($pdfContent, $data['invoiceNumber'] . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
            });

            
            // Send email to customer
            Mail::send('emails.invoice_customer', $data, function($message) use ($pdfContent, $data) {
                $message->to($data['customerEmail'])
                    ->subject('Your Invoice from CoreX Computers - ' . $data['invoiceNumber'])
                    ->attachData($pdfContent, $data['invoiceNumber'] . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
            });
            
            return response()->json(['success' => true, 'message' => 'Invoice sent successfully']);
            
        } catch (Exception $e) {
            Log::error('Invoice Email Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false, 
                'message' => 'Failed to send invoice', 
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
