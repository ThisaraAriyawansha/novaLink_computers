<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // ── Ensure statuses exist ─────────────────────────────────────────────
        DB::table('product_status')->insertOrIgnore([
            ['id' => 1, 'status_name' => 'Active'],
            ['id' => 2, 'status_name' => 'Inactive'],
        ]);

        // ── Product definitions ───────────────────────────────────────────────
        // Each entry: product fields + optional 'features' array (key => value)
        $products = [

            // ─────────────────────────────────────────────────────────────────
            // PROCESSORS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Intel Core i9-13900K',
                'brand'            => 'Intel',
                'type'             => 'PROCESSOR',
                'tags'             => 'Top Rated',
                'description'      => '<p>The Intel Core i9-13900K is Intel\'s flagship 13th Gen Raptor Lake processor featuring 24 cores (8P+16E) and 32 threads. Ideal for gaming, content creation, and workstation workloads.</p>',
                'discounted_price' => 189900,
                'retail_price'     => 199900,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 15,
                'features'         => [
                    'socket_type'         => 'LGA1700',
                    'compatible_ram_type' => 'DDR4/DDR5',
                    'cores'               => '24',
                    'threads'             => '32',
                    'base_clock_ghz'      => '3.0',
                    'boost_clock_ghz'     => '5.8',
                    'power_consumption'   => '125',
                ],
            ],
            [
                'name'             => 'Intel Core i5-13600K',
                'brand'            => 'Intel',
                'type'             => 'PROCESSOR',
                'tags'             => 'Featured',
                'description'      => '<p>The i5-13600K delivers outstanding mid-range performance with 14 cores and 20 threads. Excellent value for gaming and productivity.</p>',
                'discounted_price' => 79900,
                'retail_price'     => 89900,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 25,
                'features'         => [
                    'socket_type'         => 'LGA1700',
                    'compatible_ram_type' => 'DDR4/DDR5',
                    'cores'               => '14',
                    'threads'             => '20',
                    'base_clock_ghz'      => '3.5',
                    'boost_clock_ghz'     => '5.1',
                    'power_consumption'   => '125',
                ],
            ],
            [
                'name'             => 'AMD Ryzen 9 7950X',
                'brand'            => 'AMD',
                'type'             => 'PROCESSOR',
                'tags'             => 'Top Rated',
                'description'      => '<p>AMD\'s top-tier Zen 4 processor with 16 cores and 32 threads. Best-in-class multi-core performance for professional workloads.</p>',
                'discounted_price' => 195000,
                'retail_price'     => 210000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
                'features'         => [
                    'socket_type'         => 'AM5',
                    'compatible_ram_type' => 'DDR5',
                    'cores'               => '16',
                    'threads'             => '32',
                    'base_clock_ghz'      => '4.5',
                    'boost_clock_ghz'     => '5.7',
                    'power_consumption'   => '170',
                ],
            ],
            [
                'name'             => 'AMD Ryzen 5 7600X',
                'brand'            => 'AMD',
                'type'             => 'PROCESSOR',
                'tags'             => 'New Arrivals',
                'description'      => '<p>The Ryzen 5 7600X offers excellent gaming performance with 6 cores and 12 threads on the AM5 platform with DDR5 support.</p>',
                'discounted_price' => 59900,
                'retail_price'     => 65000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 30,
                'features'         => [
                    'socket_type'         => 'AM5',
                    'compatible_ram_type' => 'DDR5',
                    'cores'               => '6',
                    'threads'             => '12',
                    'base_clock_ghz'      => '4.7',
                    'boost_clock_ghz'     => '5.3',
                    'power_consumption'   => '105',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // MOTHERBOARDS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'ASUS ROG STRIX Z790-E Gaming WiFi',
                'brand'            => 'ASUS',
                'type'             => 'MOTHERBOARD',
                'tags'             => 'Top Rated',
                'description'      => '<p>Premium Z790 ATX motherboard for Intel 12th/13th/14th Gen. Features PCIe 5.0, DDR5, Wi-Fi 6E, and extensive thermal management.</p>',
                'discounted_price' => 149900,
                'retail_price'     => 165000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 8,
                'features'         => [
                    'socket_type'         => 'LGA1700',
                    'form_factor'         => 'ATX',
                    'supported_ram_type'  => 'DDR5',
                    'ram_slots'           => '4',
                    'max_ram_gb'          => '192',
                    'supported_ram_speed' => '4800, 5200, 5600, 6400',
                    'm2_slots'            => '5',
                    'sata_ports'          => '4',
                    'usb_a_ports'         => '8',
                    'usb_c_ports'         => '2',
                    'pcie_x16_slots'      => '2',
                    'wifi'                => 'Yes',
                ],
            ],
            [
                'name'             => 'MSI MAG B650 TOMAHAWK WiFi',
                'brand'            => 'MSI',
                'type'             => 'MOTHERBOARD',
                'tags'             => 'Featured',
                'description'      => '<p>AMD B650 ATX board for Ryzen 7000 series. Excellent power delivery, 4x DDR5 slots, and Wi-Fi 6E included.</p>',
                'discounted_price' => 89900,
                'retail_price'     => 98000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 12,
                'features'         => [
                    'socket_type'         => 'AM5',
                    'form_factor'         => 'ATX',
                    'supported_ram_type'  => 'DDR5',
                    'ram_slots'           => '4',
                    'max_ram_gb'          => '128',
                    'supported_ram_speed' => '4800, 5200, 5600',
                    'm2_slots'            => '3',
                    'sata_ports'          => '6',
                    'usb_a_ports'         => '6',
                    'usb_c_ports'         => '1',
                    'pcie_x16_slots'      => '1',
                    'wifi'                => 'Yes',
                ],
            ],
            [
                'name'             => 'Gigabyte B760M DS3H DDR4',
                'brand'            => 'Gigabyte',
                'type'             => 'MOTHERBOARD',
                'tags'             => 'None',
                'description'      => '<p>Budget-friendly Micro-ATX Intel B760 board supporting DDR4 RAM. Great entry point for 12th/13th Gen Intel builds.</p>',
                'discounted_price' => 34900,
                'retail_price'     => 38000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
                'features'         => [
                    'socket_type'         => 'LGA1700',
                    'form_factor'         => 'mATX',
                    'supported_ram_type'  => 'DDR4',
                    'ram_slots'           => '2',
                    'max_ram_gb'          => '64',
                    'supported_ram_speed' => '3200, 3600, 4400',
                    'm2_slots'            => '2',
                    'sata_ports'          => '4',
                    'usb_a_ports'         => '4',
                    'usb_c_ports'         => '1',
                    'pcie_x16_slots'      => '1',
                    'wifi'                => 'No',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // RAM
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Corsair Vengeance DDR5-5600 32GB (2x16GB)',
                'brand'            => 'Corsair',
                'type'             => 'RAM',
                'tags'             => 'Featured',
                'description'      => '<p>High-speed DDR5 dual-channel kit optimized for Intel and AMD DDR5 platforms. XMP 3.0 ready.</p>',
                'discounted_price' => 34900,
                'retail_price'     => 39900,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 40,
                'features'         => [
                    'ram_type'          => 'DDR5',
                    'speed_mhz'         => '5600',
                    'capacity_gb'       => '16',
                    'sticks_count'      => '2',
                    'power_consumption' => '6',
                ],
            ],
            [
                'name'             => 'Kingston FURY Beast DDR4-3200 16GB (2x8GB)',
                'brand'            => 'Kingston',
                'type'             => 'RAM',
                'tags'             => 'None',
                'description'      => '<p>Entry-level yet reliable DDR4 dual-channel kit at 3200MHz with XMP 2.0 profile support.</p>',
                'discounted_price' => 14900,
                'retail_price'     => 17000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 60,
                'features'         => [
                    'ram_type'          => 'DDR4',
                    'speed_mhz'         => '3200',
                    'capacity_gb'       => '8',
                    'sticks_count'      => '2',
                    'power_consumption' => '4',
                ],
            ],
            [
                'name'             => 'G.Skill Trident Z5 DDR5-6000 64GB (2x32GB)',
                'brand'            => 'G.Skill',
                'type'             => 'RAM',
                'tags'             => 'Top Rated',
                'description'      => '<p>Enthusiast DDR5 kit running at 6000MHz for workstations and high-performance gaming rigs. RGB lighting included.</p>',
                'discounted_price' => 74900,
                'retail_price'     => 82000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 18,
                'features'         => [
                    'ram_type'          => 'DDR5',
                    'speed_mhz'         => '6000',
                    'capacity_gb'       => '32',
                    'sticks_count'      => '2',
                    'power_consumption' => '8',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // GRAPHIC CARDS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'NVIDIA RTX 4090 24GB GDDR6X',
                'brand'            => 'NVIDIA',
                'type'             => 'GRAPHIC CARDS',
                'tags'             => 'Top Rated',
                'description'      => '<p>NVIDIA\'s flagship Ada Lovelace GPU. Unmatched 4K gaming performance, ray tracing, and DLSS 3.0. 24GB GDDR6X VRAM for extreme workloads.</p>',
                'discounted_price' => 485000,
                'retail_price'     => 520000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 5,
                'features'         => [
                    'vram_gb'           => '24',
                    'power_consumption' => '450',
                    'power_connector'   => '1x 16-pin',
                    'hdmi_ports'        => '1',
                    'displayport_ports' => '3',
                ],
            ],
            [
                'name'             => 'NVIDIA RTX 4070 12GB GDDR6X',
                'brand'            => 'NVIDIA',
                'type'             => 'GRAPHIC CARDS',
                'tags'             => 'Featured',
                'description'      => '<p>Excellent 1440p gaming GPU with Ada Lovelace architecture, DLSS 3.0, and 12GB GDDR6X VRAM. Great price-to-performance ratio.</p>',
                'discounted_price' => 189900,
                'retail_price'     => 205000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 12,
                'features'         => [
                    'vram_gb'           => '12',
                    'power_consumption' => '200',
                    'power_connector'   => '1x 16-pin',
                    'hdmi_ports'        => '1',
                    'displayport_ports' => '3',
                ],
            ],
            [
                'name'             => 'AMD Radeon RX 7900 XTX 24GB',
                'brand'            => 'AMD',
                'type'             => 'GRAPHIC CARDS',
                'tags'             => 'Top Rated',
                'description'      => '<p>AMD\'s flagship RDNA 3 GPU with 24GB GDDR6 and exceptional rasterization performance for 4K gaming.</p>',
                'discounted_price' => 349000,
                'retail_price'     => 375000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 7,
                'features'         => [
                    'vram_gb'           => '24',
                    'power_consumption' => '355',
                    'power_connector'   => '2x 8-pin',
                    'hdmi_ports'        => '1',
                    'displayport_ports' => '2',
                ],
            ],
            [
                'name'             => 'NVIDIA RTX 4060 8GB GDDR6',
                'brand'            => 'NVIDIA',
                'type'             => 'GRAPHIC CARDS',
                'tags'             => 'New Arrivals',
                'description'      => '<p>Budget-friendly 1080p/1440p GPU for mainstream gaming. Low 115W TDP makes it ideal for small form-factor builds.</p>',
                'discounted_price' => 99900,
                'retail_price'     => 109000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 22,
                'features'         => [
                    'vram_gb'           => '8',
                    'power_consumption' => '115',
                    'power_connector'   => '1x 8-pin',
                    'hdmi_ports'        => '1',
                    'displayport_ports' => '3',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // POWER SUPPLY
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Corsair RM1000x 1000W 80+ Gold Fully Modular',
                'brand'            => 'Corsair',
                'type'             => 'POWER SUPPLY',
                'tags'             => 'Featured',
                'description'      => '<p>Fully modular 1000W ATX PSU with 80+ Gold efficiency. Zero RPM fan mode for silent operation under light loads. 10-year warranty.</p>',
                'discounted_price' => 59900,
                'retail_price'     => 67000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 15,
                'features'         => [
                    'wattage_w'         => '1000',
                    'efficiency_rating' => '80+ Gold',
                    'psu_form_factor'   => 'ATX',
                    'modular'           => 'Fully Modular',
                ],
            ],
            [
                'name'             => 'Seasonic FOCUS GX-750 750W 80+ Gold',
                'brand'            => 'Seasonic',
                'type'             => 'POWER SUPPLY',
                'tags'             => 'Top Rated',
                'description'      => '<p>High-quality 750W fully modular PSU from Seasonic. 80+ Gold certified with a 10-year warranty. Ideal for mid to high-end builds.</p>',
                'discounted_price' => 42900,
                'retail_price'     => 47900,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
                'features'         => [
                    'wattage_w'         => '750',
                    'efficiency_rating' => '80+ Gold',
                    'psu_form_factor'   => 'ATX',
                    'modular'           => 'Fully Modular',
                ],
            ],
            [
                'name'             => 'Cooler Master MWE 550W 80+ Bronze',
                'brand'            => 'Cooler Master',
                'type'             => 'POWER SUPPLY',
                'tags'             => 'None',
                'description'      => '<p>Entry-level 550W PSU with 80+ Bronze certification. Semi-modular design keeps cables tidy. Good value for budget builds.</p>',
                'discounted_price' => 17900,
                'retail_price'     => 21000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 35,
                'features'         => [
                    'wattage_w'         => '550',
                    'efficiency_rating' => '80+ Bronze',
                    'psu_form_factor'   => 'ATX',
                    'modular'           => 'Semi-Modular',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // SSD NVME
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Samsung 990 Pro 2TB PCIe 4.0 NVMe',
                'brand'            => 'Samsung',
                'type'             => 'SSD NVME',
                'tags'             => 'Top Rated',
                'description'      => '<p>Flagship PCIe 4.0 NVMe SSD with sequential read speeds up to 7450 MB/s. 2TB capacity for demanding workloads.</p>',
                'discounted_price' => 39900,
                'retail_price'     => 44900,
                'warranty'         => '5 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 25,
                'features'         => [
                    'storage_type'      => 'NVMe PCIe 4.0',
                    'capacity'          => '2TB',
                    'interface'         => 'M.2 NVMe',
                    'power_consumption' => '7',
                ],
            ],
            [
                'name'             => 'WD Black SN850X 1TB PCIe 4.0 NVMe',
                'brand'            => 'Western Digital',
                'type'             => 'SSD NVME',
                'tags'             => 'Featured',
                'description'      => '<p>Gaming-optimized NVMe SSD with 7300 MB/s read speeds. Includes optional heatsink. PlayStation 5 compatible.</p>',
                'discounted_price' => 22900,
                'retail_price'     => 26900,
                'warranty'         => '5 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 30,
                'features'         => [
                    'storage_type'      => 'NVMe PCIe 4.0',
                    'capacity'          => '1TB',
                    'interface'         => 'M.2 NVMe',
                    'power_consumption' => '6',
                ],
            ],
            [
                'name'             => 'Kingston NV2 500GB PCIe 3.0 NVMe',
                'brand'            => 'Kingston',
                'type'             => 'SSD NVME',
                'tags'             => 'None',
                'description'      => '<p>Budget-friendly NVMe SSD with 3500 MB/s read speeds. Perfect as a boot drive for budget and mid-range builds.</p>',
                'discounted_price' => 8900,
                'retail_price'     => 10500,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 50,
                'features'         => [
                    'storage_type'      => 'NVMe PCIe 3.0',
                    'capacity'          => '500GB',
                    'interface'         => 'M.2 NVMe',
                    'power_consumption' => '4',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // HARD DISK
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Seagate Barracuda 2TB 3.5" SATA HDD',
                'brand'            => 'Seagate',
                'type'             => 'HARD DISK',
                'tags'             => 'None',
                'description'      => '<p>Reliable 2TB 3.5" SATA hard drive at 7200 RPM. Ideal for bulk storage alongside an SSD in desktop builds.</p>',
                'discounted_price' => 12900,
                'retail_price'     => 14500,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 40,
                'features'         => [
                    'storage_type'      => 'HDD 7200 RPM',
                    'capacity'          => '2TB',
                    'interface'         => '3.5 SATA',
                    'power_consumption' => '9',
                ],
            ],
            [
                'name'             => 'WD Blue 4TB 3.5" SATA HDD',
                'brand'            => 'Western Digital',
                'type'             => 'HARD DISK',
                'tags'             => 'None',
                'description'      => '<p>4TB desktop HDD at 5400 RPM. Low noise, reliable, and great for media storage or NAS setups.</p>',
                'discounted_price' => 18900,
                'retail_price'     => 21000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 30,
                'features'         => [
                    'storage_type'      => 'HDD 5400 RPM',
                    'capacity'          => '4TB',
                    'interface'         => '3.5 SATA',
                    'power_consumption' => '8',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // STORAGE & NAS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Synology DS923+ 4-Bay NAS',
                'brand'            => 'Synology',
                'type'             => 'STORAGE & NAS',
                'tags'             => 'Featured',
                'description'      => '<p>4-bay NAS for home and business with AMD Ryzen R1600 dual-core, 4GB ECC RAM, and 2x 1GbE + optional 10GbE support.</p>',
                'discounted_price' => 109000,
                'retail_price'     => 120000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 6,
                'features'         => [
                    'storage_type'      => 'NAS Drive',
                    'capacity'          => 'Diskless (4 bays)',
                    'interface'         => '3.5 SATA',
                    'power_consumption' => '40',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // CASINGS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Lian Li PC-O11 Dynamic EVO ATX Mid Tower',
                'brand'            => 'Lian Li',
                'type'             => 'CASINGS',
                'tags'             => 'Top Rated',
                'description'      => '<p>Premium dual-chamber ATX case with tempered glass panels. Excellent airflow and radiator support. Supports E-ATX, ATX, mATX and ITX boards.</p>',
                'discounted_price' => 34900,
                'retail_price'     => 39000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 15,
                'features'         => [
                    'form_factor_support' => 'E-ATX',
                    'drive_bays'          => '2x 3.5", 4x 2.5"',
                ],
            ],
            [
                'name'             => 'NZXT H510 Flow ATX Mid Tower',
                'brand'            => 'NZXT',
                'type'             => 'CASINGS',
                'tags'             => 'Featured',
                'description'      => '<p>Clean, minimalist ATX mid-tower with perforated front panel for improved airflow. Tempered glass side panel included.</p>',
                'discounted_price' => 24900,
                'retail_price'     => 28000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
                'features'         => [
                    'form_factor_support' => 'ATX',
                    'drive_bays'          => '2x 3.5", 2x 2.5"',
                ],
            ],
            [
                'name'             => 'Cooler Master MasterBox Q300L mATX Mini Tower',
                'brand'            => 'Cooler Master',
                'type'             => 'CASINGS',
                'tags'             => 'None',
                'description'      => '<p>Compact mATX case with magnetic dust filter and modular design. Ideal for budget micro-ATX builds.</p>',
                'discounted_price' => 11900,
                'retail_price'     => 13500,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 25,
                'features'         => [
                    'form_factor_support' => 'mATX',
                    'drive_bays'          => '2x 3.5", 2x 2.5"',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // COOLING & LIGHTING
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'NZXT Kraken X73 360mm AIO Liquid Cooler',
                'brand'            => 'NZXT',
                'type'             => 'COOLING & LIGHTING',
                'tags'             => 'Top Rated',
                'description'      => '<p>360mm AIO CPU cooler with three 120mm Aer RGB fans and an LCD pump head display. Exceptional thermal performance.</p>',
                'discounted_price' => 39900,
                'retail_price'     => 45000,
                'warranty'         => '6 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 12,
                'features'         => [
                    'cooler_type'         => 'AIO 360mm',
                    'socket_compatibility'=> 'LGA1700, LGA1200, AM5, AM4',
                    'max_tdp_support'     => '300',
                    'fan_count'           => '3',
                    'power_consumption'   => '18',
                ],
            ],
            [
                'name'             => 'Noctua NH-D15 Dual Tower Air Cooler',
                'brand'            => 'Noctua',
                'type'             => 'COOLING & LIGHTING',
                'tags'             => 'Featured',
                'description'      => '<p>Industry-leading dual tower air cooler with dual 140mm NF-A15 fans. Remarkably quiet and capable of handling 250W TDP CPUs.</p>',
                'discounted_price' => 29900,
                'retail_price'     => 33000,
                'warranty'         => '6 years warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
                'features'         => [
                    'cooler_type'         => 'Air Tower',
                    'socket_compatibility'=> 'LGA1700, LGA1200, AM5, AM4, TR4',
                    'max_tdp_support'     => '250',
                    'fan_count'           => '2',
                    'power_consumption'   => '5',
                ],
            ],
            [
                'name'             => 'Lian Li UNI FAN SL120 RGB 3-Pack 120mm',
                'brand'            => 'Lian Li',
                'type'             => 'COOLING & LIGHTING',
                'tags'             => 'New Arrivals',
                'description'      => '<p>Daisy-chain RGB case fans with infinity mirror effect. 3-pack with controller included. Perfect for airflow and aesthetics.</p>',
                'discounted_price' => 14900,
                'retail_price'     => 17000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
                'features'         => [
                    'cooler_type'         => 'Case Fan',
                    'socket_compatibility'=> '',
                    'max_tdp_support'     => '0',
                    'fan_count'           => '3',
                    'power_consumption'   => '6',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // FANS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'be quiet! Silent Wings 4 140mm Case Fan',
                'brand'            => 'be quiet!',
                'type'             => 'FANS',
                'tags'             => 'None',
                'description'      => '<p>Ultra-silent 140mm case fan with optimized blade design. Ideal for noise-sensitive builds and home office setups.</p>',
                'discounted_price' => 3900,
                'retail_price'     => 4500,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 50,
                'features'         => [
                    'cooler_type'       => 'Case Fan',
                    'fan_count'         => '1',
                    'power_consumption' => '1',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // MONITORS & ACCESSORIES
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'LG 27GP850-B 27" QHD 165Hz IPS Gaming Monitor',
                'brand'            => 'LG',
                'type'             => 'MONITORS & ACCESSORIES',
                'tags'             => 'Top Rated',
                'description'      => '<p>27-inch QHD (2560x1440) IPS panel at 165Hz with 1ms response time. AMD FreeSync Premium and NVIDIA G-Sync Compatible.</p>',
                'discounted_price' => 74900,
                'retail_price'     => 82000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
                'features'         => [
                    'resolution'       => '2560x1440 QHD',
                    'refresh_rate_hz'  => '165',
                    'panel_type'       => 'IPS',
                    'response_time_ms' => '1',
                    'hdr'              => 'HDR10',
                ],
            ],
            [
                'name'             => 'Samsung Odyssey G9 49" Ultra-Wide DQHD 240Hz',
                'brand'            => 'Samsung',
                'type'             => 'MONITORS & ACCESSORIES',
                'tags'             => 'Featured',
                'description'      => '<p>Massive 49-inch curved ultra-wide gaming monitor at 240Hz with G-Sync Ultimate and DisplayHDR 1000. The ultimate immersive gaming experience.</p>',
                'discounted_price' => 285000,
                'retail_price'     => 310000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 3,
                'features'         => [
                    'resolution'       => '5120x1440 DQHD',
                    'refresh_rate_hz'  => '240',
                    'panel_type'       => 'VA',
                    'response_time_ms' => '1',
                    'hdr'              => 'DisplayHDR 1000',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // MONITORS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Dell P2423D 24" QHD IPS Professional Monitor',
                'brand'            => 'Dell',
                'type'             => 'MONITORS',
                'tags'             => 'None',
                'description'      => '<p>Business-grade 24" QHD IPS monitor with USB-C 90W power delivery, excellent colour accuracy, and ergonomic stand.</p>',
                'discounted_price' => 59900,
                'retail_price'     => 65000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
                'features'         => [
                    'resolution'  => '2560x1440 QHD',
                    'panel_type'  => 'IPS',
                    'refresh_rate_hz' => '60',
                ],
            ],

            // ─────────────────────────────────────────────────────────────────
            // LAPTOPS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'brand'            => 'Lenovo',
                'type'             => 'LAPTOPS',
                'tags'             => 'Featured',
                'description'      => '<p>Ultra-light business laptop at just 1.12kg. Intel Core i7-1365U, 32GB LPDDR5, 1TB NVMe SSD, 14" 2.8K OLED display, and Thunderbolt 4.</p>',
                'discounted_price' => 349000,
                'retail_price'     => 385000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 6,
            ],
            [
                'name'             => 'HP OMEN 16 Gaming Laptop RTX 4070',
                'brand'            => 'HP',
                'type'             => 'LAPTOPS',
                'tags'             => 'Top Rated',
                'description'      => '<p>High-performance gaming laptop with Intel i9-13900HX, RTX 4070 8GB, 32GB DDR5, 1TB SSD, and a 165Hz QHD IPS display.</p>',
                'discounted_price' => 419000,
                'retail_price'     => 449000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 5,
            ],

            // ─────────────────────────────────────────────────────────────────
            // ASUS ROG
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'ASUS ROG Strix SCAR 18 G834JYR',
                'brand'            => 'ASUS',
                'type'             => 'ASUS ROG',
                'tags'             => 'Top Rated',
                'description'      => '<p>Extreme gaming laptop featuring Intel i9-14900HX, NVIDIA RTX 4090 16GB, 64GB DDR5, 2TB NVMe RAID, and an 18" QHD+ 240Hz mini-LED display.</p>',
                'discounted_price' => 689000,
                'retail_price'     => 750000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 3,
            ],

            // ─────────────────────────────────────────────────────────────────
            // APPLE PRODUCTS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Apple MacBook Pro 16" M3 Max 48GB',
                'brand'            => 'Apple',
                'type'             => 'APPLE PRODUCTS',
                'tags'             => 'Top Rated',
                'description'      => '<p>The most powerful MacBook ever with Apple M3 Max chip, 48GB unified memory, 1TB SSD, and a Liquid Retina XDR 16.2" display.</p>',
                'discounted_price' => 649000,
                'retail_price'     => 699000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 4,
            ],
            [
                'name'             => 'Apple iPad Pro 12.9" M2 Wi-Fi 256GB',
                'brand'            => 'Apple',
                'type'             => 'APPLE PRODUCTS',
                'tags'             => 'Featured',
                'description'      => '<p>iPad Pro with M2 chip, Liquid Retina XDR display, USB-C Thunderbolt, and Apple Pencil hover support.</p>',
                'discounted_price' => 195000,
                'retail_price'     => 215000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 8,
            ],

            // ─────────────────────────────────────────────────────────────────
            // GAMING CONSOLE
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Sony PlayStation 5 Disc Edition',
                'brand'            => 'Sony',
                'type'             => 'GAMING CONSOLE',
                'tags'             => 'Featured',
                'description'      => '<p>Sony\'s flagship gaming console with AMD Zen 2 CPU, custom RDNA 2 GPU, 16GB GDDR6, and 825GB NVMe SSD. 4K gaming at up to 120fps.</p>',
                'discounted_price' => 139900,
                'retail_price'     => 155000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
            ],
            [
                'name'             => 'Microsoft Xbox Series X 1TB',
                'brand'            => 'Microsoft',
                'type'             => 'GAMING CONSOLE',
                'tags'             => 'Top Rated',
                'description'      => '<p>Xbox Series X delivers true 4K gaming at 60fps (up to 120fps), 1TB custom NVMe SSD, and Xbox Game Pass ready.</p>',
                'discounted_price' => 129900,
                'retail_price'     => 145000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 18,
            ],

            // ─────────────────────────────────────────────────────────────────
            // KEYBOARDS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Keychron Q3 Pro QMK/VIA Wireless Mechanical Keyboard',
                'brand'            => 'Keychron',
                'type'             => 'KEYBOARDS',
                'tags'             => 'Top Rated',
                'description'      => '<p>Compact TKL wireless mechanical keyboard with hot-swap PCB, gasket mount, and full QMK/VIA programmability. Available in Red/Brown/Blue switches.</p>',
                'discounted_price' => 24900,
                'retail_price'     => 28000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
                'features'         => [
                    'switch_type'  => 'Gateron G Pro Red',
                    'connectivity' => 'Bluetooth 5.1 / USB-C',
                    'form_factor'  => 'TKL (80%)',
                    'backlighting' => 'RGB',
                ],
            ],
            [
                'name'             => 'Logitech G Pro X TKL Gaming Keyboard',
                'brand'            => 'Logitech',
                'type'             => 'KEYBOARDS',
                'tags'             => 'Featured',
                'description'      => '<p>Tournament-grade TKL keyboard with GX Blue/Red switches, detachable USB cable, and programmable via Logitech G HUB.</p>',
                'discounted_price' => 19900,
                'retail_price'     => 22000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 25,
            ],

            // ─────────────────────────────────────────────────────────────────
            // MOUSE
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Logitech G502 X Plus Wireless Gaming Mouse',
                'brand'            => 'Logitech',
                'type'             => 'MOUSE',
                'tags'             => 'Top Rated',
                'description'      => '<p>Flagship wireless gaming mouse with 25,600 DPI HERO 25K sensor, LIGHTFORCE hybrid switches, and up to 130-hour battery life.</p>',
                'discounted_price' => 22900,
                'retail_price'     => 26000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 30,
                'features'         => [
                    'dpi'          => '100-25600',
                    'connectivity' => 'LIGHTSPEED Wireless / USB-C',
                    'weight_g'     => '106',
                ],
            ],
            [
                'name'             => 'Razer DeathAdder V3 HyperSpeed',
                'brand'            => 'Razer',
                'type'             => 'MOUSE',
                'tags'             => 'Featured',
                'description'      => '<p>Ultra-lightweight wireless ergonomic gaming mouse at 64g. Features Razer Focus Pro 30K sensor and 90-hour battery life.</p>',
                'discounted_price' => 14900,
                'retail_price'     => 17000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 25,
            ],

            // ─────────────────────────────────────────────────────────────────
            // MOUSE PAD
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'SteelSeries QcK Edge XL Gaming Mouse Pad',
                'brand'            => 'SteelSeries',
                'type'             => 'MOUSE PAD',
                'tags'             => 'None',
                'description'      => '<p>Extra-large cloth gaming mouse pad (900x300mm) with micro-woven surface for precision tracking. Non-slip rubber base.</p>',
                'discounted_price' => 4900,
                'retail_price'     => 5900,
                'warranty'         => '1 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 60,
            ],

            // ─────────────────────────────────────────────────────────────────
            // HEADSET
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Sony WH-1000XM5 Wireless Noise Cancelling Headphones',
                'brand'            => 'Sony',
                'type'             => 'HEADSET',
                'tags'             => 'Top Rated',
                'description'      => '<p>Industry-leading noise cancellation with 30-hour battery life, quick-charge support, and Hi-Res Audio certification.</p>',
                'discounted_price' => 69900,
                'retail_price'     => 78000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 15,
            ],
            [
                'name'             => 'HyperX Cloud Alpha Wireless Gaming Headset',
                'brand'            => 'HyperX',
                'type'             => 'HEADSET',
                'tags'             => 'Featured',
                'description'      => '<p>300-hour battery wireless gaming headset with dual chamber drivers, detachable noise-cancelling microphone, and DTS Headphone:X Spatial Audio.</p>',
                'discounted_price' => 34900,
                'retail_price'     => 39000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 20,
            ],

            // ─────────────────────────────────────────────────────────────────
            // SPEAKERS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Logitech Z623 2.1 THX-Certified Speaker System',
                'brand'            => 'Logitech',
                'type'             => 'SPEAKERS',
                'tags'             => 'None',
                'description'      => '<p>400W peak power 2.1 speaker system with THX certification. Deep bass from the 8" subwoofer and rich highs from the satellites.</p>',
                'discounted_price' => 24900,
                'retail_price'     => 28000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 12,
            ],

            // ─────────────────────────────────────────────────────────────────
            // UPS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'APC Smart-UPS 1500VA LCD 900W 230V',
                'brand'            => 'APC',
                'type'             => 'UPS',
                'tags'             => 'Featured',
                'description'      => '<p>1500VA / 900W line-interactive UPS with LCD panel, automatic voltage regulation, and USB/serial connectivity. Ideal for desktop workstations in Sri Lanka.</p>',
                'discounted_price' => 64900,
                'retail_price'     => 72000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
                'features'         => [
                    'capacity_va'  => '1500',
                    'capacity_w'   => '900',
                    'outlets'      => '8',
                    'runtime_full' => '~6 min at full load',
                ],
            ],
            [
                'name'             => 'APC Back-UPS 600VA 360W 230V',
                'brand'            => 'APC',
                'type'             => 'UPS',
                'tags'             => 'None',
                'description'      => '<p>Entry-level 600VA / 360W UPS for home office and basic desktop systems. Protects against power surges and blackouts.</p>',
                'discounted_price' => 18900,
                'retail_price'     => 22000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 25,
            ],

            // ─────────────────────────────────────────────────────────────────
            // THERMAL PASTE
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Thermal Grizzly Kryonaut 1g High Performance',
                'brand'            => 'Thermal Grizzly',
                'type'             => 'THERMAL PASTE',
                'tags'             => 'Top Rated',
                'description'      => '<p>Premium non-conductive thermal compound with 12.5 W/mK thermal conductivity. Best choice for high-end CPU/GPU thermal management.</p>',
                'discounted_price' => 1900,
                'retail_price'     => 2400,
                'warranty'         => '1 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 80,
            ],
            [
                'name'             => 'Arctic MX-6 4g Thermal Compound',
                'brand'            => 'Arctic',
                'type'             => 'THERMAL PASTE',
                'tags'             => 'None',
                'description'      => '<p>Reliable, non-electrically conductive thermal paste with 12.6 W/mK rating. Easy to apply and clean. Great for mainstream builds.</p>',
                'discounted_price' => 1400,
                'retail_price'     => 1800,
                'warranty'         => '1 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 100,
            ],

            // ─────────────────────────────────────────────────────────────────
            // GAMING DESKTOPS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'NovaLink Vortex X Gaming Desktop (RTX 4080)',
                'brand'            => 'NovaLink',
                'type'             => 'GAMING DESKTOPS',
                'tags'             => 'Featured',
                'description'      => '<ul><li>Intel Core i9-13900K</li><li>NVIDIA RTX 4080 16GB</li><li>32GB DDR5 5600MHz</li><li>2TB PCIe 4.0 NVMe + 4TB HDD</li><li>850W 80+ Gold PSU</li><li>360mm AIO Cooler</li></ul>',
                'discounted_price' => 579000,
                'retail_price'     => 629000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 3,
            ],

            // ─────────────────────────────────────────────────────────────────
            // BUDGET DESKTOP COMPUTERS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'NovaLink StartUp Budget Desktop (Ryzen 5)',
                'brand'            => 'NovaLink',
                'type'             => 'BUDGET DESKTOP COMPUTERS',
                'tags'             => 'None',
                'description'      => '<ul><li>AMD Ryzen 5 5600G (Integrated Graphics)</li><li>16GB DDR4 3200MHz</li><li>500GB NVMe SSD</li><li>550W 80+ Bronze PSU</li><li>mATX Case</li></ul>',
                'discounted_price' => 89000,
                'retail_price'     => 98000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 8,
            ],

            // ─────────────────────────────────────────────────────────────────
            // DESKTOP WORKSTATIONS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'NovaLink ProStation W1 Workstation (Ryzen 9)',
                'brand'            => 'NovaLink',
                'type'             => 'DESKTOP WORKSTATIONS',
                'tags'             => 'Featured',
                'description'      => '<ul><li>AMD Ryzen 9 7950X (16 Cores)</li><li>NVIDIA RTX A4000 16GB</li><li>128GB DDR5 ECC</li><li>4TB NVMe SSD RAID</li><li>1000W Platinum PSU</li></ul>',
                'discounted_price' => 895000,
                'retail_price'     => 980000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 2,
            ],

            // ─────────────────────────────────────────────────────────────────
            // CABLES
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Cable Matters Active 8K DisplayPort 1.4 Cable 3m',
                'brand'            => 'Cable Matters',
                'type'             => 'CABLES',
                'tags'             => 'None',
                'description'      => '<p>8K@60Hz and 4K@144Hz DisplayPort 1.4 cable. Supports HBR3, HDR, and DSC. 3-meter length for desktop setups.</p>',
                'discounted_price' => 3900,
                'retail_price'     => 4500,
                'warranty'         => '1 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 40,
            ],
            [
                'name'             => 'Anker 100W USB-C to USB-C Braided Cable 1.8m',
                'brand'            => 'Anker',
                'type'             => 'CABLES',
                'tags'             => 'None',
                'description'      => '<p>100W fast charging USB-C cable with 10Gbps data transfer. Nylon braided for durability. Works with laptops, phones, and tablets.</p>',
                'discounted_price' => 2400,
                'retail_price'     => 2900,
                'warranty'         => '1 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 60,
            ],

            // ─────────────────────────────────────────────────────────────────
            // EXPANSION CARDS & NETWORKING
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'ASUS PCE-AXE59BT WiFi 6E PCIe Adapter',
                'brand'            => 'ASUS',
                'type'             => 'EXPANSION CARDS & NETWORKING',
                'tags'             => 'None',
                'description'      => '<p>PCIe Wi-Fi 6E + Bluetooth 5.2 adapter. Tri-band 6GHz/5GHz/2.4GHz support for blazing-fast wireless connectivity for desktop PCs.</p>',
                'discounted_price' => 14900,
                'retail_price'     => 17000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 15,
            ],

            // ─────────────────────────────────────────────────────────────────
            // KEYBOARDS, MOUSE & GAMEPADS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Razer Huntsman V3 Pro Keyboard + DeathAdder V3 Bundle',
                'brand'            => 'Razer',
                'type'             => 'KEYBOARDS, MOUSE & GAMEPADS',
                'tags'             => 'Featured',
                'description'      => '<p>Complete gaming peripheral bundle including the Razer Huntsman V3 Pro full-size keyboard with analog optical switches and the DeathAdder V3 wired gaming mouse.</p>',
                'discounted_price' => 54900,
                'retail_price'     => 62000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 8,
            ],

            // ─────────────────────────────────────────────────────────────────
            // SPEAKERS & HEADPHONES
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Bose QuietComfort 45 Wireless Headphones',
                'brand'            => 'Bose',
                'type'             => 'SPEAKERS & HEADPHONES',
                'tags'             => 'Top Rated',
                'description'      => '<p>World-class noise cancellation in a lightweight design. 24-hour battery, Aware Mode for ambient sound, and plush ear cushions.</p>',
                'discounted_price' => 69900,
                'retail_price'     => 78000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
            ],

            // ─────────────────────────────────────────────────────────────────
            // GRAPHICS TABLET / TAB
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Wacom Intuos Pro Large Creative Pen Tablet',
                'brand'            => 'Wacom',
                'type'             => 'GRAPHICS TABLET / TAB',
                'tags'             => 'Featured',
                'description'      => '<p>Professional pen tablet with 8192 levels of pressure, tilt recognition, multi-touch surface, and Bluetooth connectivity. Ideal for illustrators and designers.</p>',
                'discounted_price' => 89900,
                'retail_price'     => 98000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 6,
            ],

            // ─────────────────────────────────────────────────────────────────
            // LIVE STREAMING & RECORDING
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Elgato Stream Deck MK.2 15-Key',
                'brand'            => 'Elgato',
                'type'             => 'LIVE STREAMING & RECORDING',
                'tags'             => 'Featured',
                'description'      => '<p>15 customizable LCD keys for scene switching, media control, and app launching. The essential streaming control panel for OBS and Streamlabs.</p>',
                'discounted_price' => 29900,
                'retail_price'     => 34000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
            ],
            [
                'name'             => 'Blue Yeti USB Condenser Microphone',
                'brand'            => 'Logitech',
                'type'             => 'LIVE STREAMING & RECORDING',
                'tags'             => 'Top Rated',
                'description'      => '<p>Professional USB condenser microphone with four polar patterns (cardioid, bidirectional, omnidirectional, stereo). Plug-and-play for streaming and podcasting.</p>',
                'discounted_price' => 22900,
                'retail_price'     => 26000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 12,
            ],

            // ─────────────────────────────────────────────────────────────────
            // OPTICAL DRIVERS & PRINTERS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'ASUS BW-16D1HT Internal Blu-ray Drive',
                'brand'            => 'ASUS',
                'type'             => 'OPTICAL DRIVERS & PRINTERS',
                'tags'             => 'None',
                'description'      => '<p>Internal 16x Blu-ray burner with M-DISC support for archival quality disc burning. SATA interface.</p>',
                'discounted_price' => 14900,
                'retail_price'     => 17000,
                'warranty'         => '2 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 10,
            ],
            [
                'name'             => 'HP LaserJet Pro MFP M428fdw',
                'brand'            => 'HP',
                'type'             => 'OPTICAL DRIVERS & PRINTERS',
                'tags'             => 'Featured',
                'description'      => '<p>Multifunction laser printer/scanner/copier/fax with Wi-Fi, Ethernet, duplex printing, and 40 ppm print speed. Ideal for home offices.</p>',
                'discounted_price' => 84900,
                'retail_price'     => 93000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 6,
            ],

            // ─────────────────────────────────────────────────────────────────
            // CHAIRS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Secretlab TITAN Evo 2022 Gaming Chair XL',
                'brand'            => 'Secretlab',
                'type'             => 'CHAIRS',
                'tags'             => 'Top Rated',
                'description'      => '<p>Premium gaming chair with patented 4-way L-ADAPT lumbar support, magnetic memory foam head pillow, and NEO Hybrid Leatherette upholstery.</p>',
                'discounted_price' => 119000,
                'retail_price'     => 135000,
                'warranty'         => '3 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 6,
            ],

            // ─────────────────────────────────────────────────────────────────
            // TABLES
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'FlexiSpot E7 Pro Electric Height-Adjustable Standing Desk 160x80cm',
                'brand'            => 'FlexiSpot',
                'type'             => 'TABLES',
                'tags'             => 'Featured',
                'description'      => '<p>Dual-motor electric standing desk with 125kg load capacity, programmable height memory, and anti-collision technology. 160x80cm bamboo surface.</p>',
                'discounted_price' => 89000,
                'retail_price'     => 98000,
                'warranty'         => '5 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 4,
            ],

            // ─────────────────────────────────────────────────────────────────
            // ANTIVIRUS SOFTWARE
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Kaspersky Total Security 3 Devices 1 Year',
                'brand'            => 'Kaspersky',
                'type'             => 'ANTIVIRUS SOFTWARE',
                'tags'             => 'None',
                'description'      => '<p>Comprehensive security suite covering antivirus, firewall, VPN, parental controls, and password manager. Covers 3 devices for 1 year.</p>',
                'discounted_price' => 6900,
                'retail_price'     => 8500,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 100,
            ],

            // ─────────────────────────────────────────────────────────────────
            // COMMERCIAL SOLUTIONS
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'Cisco Catalyst 2960-X 48-Port Managed Switch',
                'brand'            => 'Cisco',
                'type'             => 'COMMERCIAL SOLUTIONS',
                'tags'             => 'None',
                'description'      => '<p>Enterprise-grade 48-port Gigabit managed switch with 4x 10G SFP+ uplinks, full Layer 2 management, and Cisco IOS support.</p>',
                'discounted_price' => 189000,
                'retail_price'     => 210000,
                'warranty'         => '1 year Warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 3,
            ],

            // ─────────────────────────────────────────────────────────────────
            // GIFT VOUCHER
            // ─────────────────────────────────────────────────────────────────
            [
                'name'             => 'NovaLink Gift Voucher — LKR 5,000',
                'brand'            => 'NovaLink',
                'type'             => 'GIFT VOUCHER',
                'tags'             => 'None',
                'description'      => '<p>A LKR 5,000 NovaLink Computers gift voucher redeemable on any in-store or online purchase. Perfect gift for tech enthusiasts.</p>',
                'discounted_price' => 5000,
                'retail_price'     => 5000,
                'warranty'         => '6 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 999,
            ],
            [
                'name'             => 'NovaLink Gift Voucher — LKR 10,000',
                'brand'            => 'NovaLink',
                'type'             => 'GIFT VOUCHER',
                'tags'             => 'Featured',
                'description'      => '<p>A LKR 10,000 NovaLink Computers gift voucher. Valid for 6 months from purchase date.</p>',
                'discounted_price' => 10000,
                'retail_price'     => 10000,
                'warranty'         => '6 months warranty',
                'in_stock'         => 'In Stock',
                'qty'              => 999,
            ],

        ];

        // ── Insert products & features ────────────────────────────────────────
        $now = Carbon::now();

        foreach ($products as $data) {
            $features = $data['features'] ?? [];
            unset($data['features']);

            // Default image placeholder
            $data['image']      = $data['image'] ?? 'ProductImages/placeholder.jpg';
            $data['status_id']  = 1;
            $data['created_at'] = $now;
            $data['updated_at'] = $now;
            $data['deal_start'] = $data['deal_start'] ?? null;
            $data['deal_end']   = $data['deal_end']   ?? null;

            $productId = DB::table('products')->insertGetId($data);

            foreach ($features as $name => $value) {
                DB::table('product_features')->insert([
                    'product_id'    => $productId,
                    'feature_name'  => $name,
                    'feature_value' => $value,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ]);
            }
        }

        $this->command->info('✓ ' . count($products) . ' products seeded across all categories.');
    }
}
