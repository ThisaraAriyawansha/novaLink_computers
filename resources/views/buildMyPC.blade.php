<?php
// Initialize session to store selected components and chipset
session_start();

// Initialize or reset selected components if needed
if (!isset($_SESSION['selected_components'])) {
    $_SESSION['selected_components'] = [];
}

// Handle chipset selection and persistence
if (isset($_GET['chipset'])) {
    $_SESSION['selected_chipset'] = strtoupper($_GET['chipset']);
}
$selected_chipset = isset($_SESSION['selected_chipset']) ? $_SESSION['selected_chipset'] : '';

// Set a flag to prevent repeated modal showing
if ($selected_chipset && !isset($_SESSION['chipset_modal_shown'])) {
    $_SESSION['chipset_modal_shown'] = true;
}

$ramCount = 1;
$graphicsCount = 1;

// page no (for changing categories accordingly)
$pageNo = 1;

if (isset($_GET['page'])) {
    $pageNo = $_GET['page'];
}

// Handle component selection
if (isset($_GET['select_component']) && isset($_GET['component_id'])) {
    $component_id = $_GET['component_id'];
    $component_type = $_GET['component_type'];


    // Find the selected product
    foreach ($products as $product) {
        if ($product['id'] == $component_id) {
            // For RAM and GPU, allow multiple selections
            if (in_array(strtoupper($component_type), ['RAM', 'GRAPHIC CARDS'])) {
                if (!isset($_SESSION['selected_components'][$component_type])) {
                    $_SESSION['selected_components'][$component_type] = [];
                }

                // Check if product is already selected
                $already_selected = false;
                foreach ($_SESSION['selected_components'][$component_type] as $selected) {
                    if ($selected['id'] == $component_id) {
                        $already_selected = true;
                        break;
                    }
                }

                if (!$already_selected) {
                    $_SESSION['selected_components'][$component_type][] = [
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'price' =>  $product['dis_price'],
                        'image' => $product['image']
                    ];

                    if ($component_type == "RAM") {
                        $ramCount++;
                    } else {
                        $graphicsCount++;
                    }
                }
            } else {
                // For other components, replace existing selection
                $_SESSION['selected_components'][$component_type] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' =>  $product['dis_price'],
                    'image' => $product['image']
                ];
            }
            break;
        }
    }

    // Redirect to remove query parameters
    header('Location: buildMyPC?component_type=' . urlencode($component_type) . '&chipset=' . urlencode($selected_chipset));
    exit;
}

// Handle component removal
if (isset($_GET['remove_component']) && isset($_GET['component_type'])) {
    $component_type = $_GET['component_type'];

    // For RAM and GPU with specific ID, remove just that one item
    if (in_array(strtoupper($component_type), ['RAM', 'GRAPHIC CARDS']) && isset($_GET['component_id'])) {
        $component_id = $_GET['component_id'];
        if (isset($_SESSION['selected_components'][$component_type])) {
            foreach ($_SESSION['selected_components'][$component_type] as $key => $item) {
                if ($item['id'] == $component_id) {
                    unset($_SESSION['selected_components'][$component_type][$key]);
                    // Reindex array
                    $_SESSION['selected_components'][$component_type] = array_values($_SESSION['selected_components'][$component_type]);
                    break;
                }
            }
            // If empty, remove the component type altogether
            if (empty($_SESSION['selected_components'][$component_type])) {
                unset($_SESSION['selected_components'][$component_type]);
            }
        }
    } else {
        // For other components, remove the entire type
        unset($_SESSION['selected_components'][$component_type]);
    }

    // Redirect to remove query parameters
    header('Location: buildMyPC?component_type=' . urlencode($component_type) . '&chipset=' . urlencode($selected_chipset));
    exit;
}

// Handle reset build
if (isset($_GET['reset_build'])) {
    $_SESSION['selected_components'] = [];
    unset($_SESSION['selected_chipset']);
    unset($_SESSION['chipset_modal_shown']);

    // Redirect to remove query parameters
    header('Location: buildMyPC');
    exit;
}

// Get the current component type to display in sidebar
$current_component_type = isset($_GET['component_type']) ? strtoupper($_GET['component_type']) : '';

// Component types to display with their associated images
$component_types_1 = [
    'PROCESSOR' => [
        'label' => 'PROCESSORS',
        'image' => 'assets/images/build-my-pc/icons/cpu.png'
    ],
    'MOTHERBOARD' => [
        'label' => 'MOTHERBOARDS',
        'image' => 'assets/images/build-my-pc/icons/motherboard.png'
    ],
    'RAM' => [
        'label' => 'MEMORY',
        'image' => 'assets/images/build-my-pc/icons/memory.png'
    ],
    'GRAPHIC CARDS' => [
        'label' => 'GRAPHIC CARDS',
        'image' => 'assets/images/build-my-pc/icons/gpu.png'
    ],
    'SSD NVME' => [
        'label' => 'SSD & NVME',
        'image' => 'assets/images/build-my-pc/icons/ssd.png'
    ],
    'HARD DISK' => [
        'label' => 'HARD DISK',
        'image' => 'assets/images/build-my-pc/icons/hdd.png'
    ],
    'POWER SUPPLY' => [
        'label' => 'POWER SUPPLY',
        'image' => 'assets/images/build-my-pc/icons/psu.png'
    ],
    'COOLING AND LIGHTING' => [
        'label' => 'COOLERS',
        'image' => 'assets/images/build-my-pc/icons/cooler.png'
    ],
    'FANS' => [
        'label' => 'FANS',
        'image' => 'assets/images/build-my-pc/icons/fans.png'
    ],
    'CASINGS' => [
        'label' => 'PC CASE',
        'image' => 'assets/images/build-my-pc/icons/case.png'
    ],
    'EXTRA SSD NVME' => [
        'label' => 'EXTRA SSD & NVME',
        'image' => 'assets/images/build-my-pc/icons/ssd.png'
    ],
    'EXTRA HARD DISK' => [
        'label' => 'EXTRA HARD DISK',
        'image' => 'assets/images/build-my-pc/icons/hdd.png'
    ],
];

$component_types_2 = [
    'MONITORS' => [
        'label' => 'MONITORS',
        'image' => 'assets/images/build-my-pc/icons/monitor.png'
    ],
    'ANTIVIRUS SOFTWARE' => [
        'label' => 'ANTIVIRUS SOFTWARE',
        'image' => 'assets/images/build-my-pc/icons/antivirus.png'
    ],
    'KEYBOARDS' => [
        'label' => 'KEYBOARDS',
        'image' => 'assets/images/build-my-pc/icons/keyboard.png'
    ],
    'MOUSE' => [
        'label' => 'MOUSE',
        'image' => 'assets/images/build-my-pc/icons/mouse.png'
    ],
    'MOUSE PAD' => [
        'label' => 'MOUSE PAD',
        'image' => 'assets/images/build-my-pc/icons/mouse-pad.png'
    ],
    'HEADSET' => [
        'label' => 'HEADSET',
        'image' => 'assets/images/build-my-pc/icons/headset.png'
    ],
    'SPEAKERS' => [
        'label' => 'SPEAKERS',
        'image' => 'assets/images/build-my-pc/icons/speaker.png'
    ],
    'UPS' => [
        'label' => 'UPS',
        'image' => 'assets/images/build-my-pc/icons/ups.png'
    ],
    'TABLES' => [
        'label' => 'TABLES',
        'image' => 'assets/images/build-my-pc/icons/tables.png'
    ],
    'CHAIRS' => [
        'label' => 'CHAIRS',
        'image' => 'assets/images/build-my-pc/icons/chairs.png'
    ],
    'THERMAL PASTE' => [
        'label' => 'THERMAL PASTE',
        'image' => 'assets/images/build-my-pc/icons/thermal-paste.png'
    ],
    'CABLES' => [
        'label' => 'CABLES',
        'image' => 'assets/images/build-my-pc/icons/cables.png'
    ],
];



// Filter products by current component type and chipset
$filtered_products = [];
if ($current_component_type) {
    foreach ($products as $product) {
        // Check if product type matches current component type
        if (strtoupper($product['type']) == $current_component_type) {
            // Apply chipset filter ONLY for processors
            if ($current_component_type == 'PROCESSOR' && $selected_chipset) {
                $name = strtoupper($product['name']);
                if (strpos($name, $selected_chipset) !== false) {
                    $filtered_products[] = $product;
                }
            } else {
                // For other component types, include all matching type products
                $filtered_products[] = $product;
            }
        }
    }
}

// Calculate total price
$total_price = 0;
if (isset($_SESSION['selected_components'])) {
    foreach ($_SESSION['selected_components'] as $type_key => $component) {
        // Check if component is an array of multiple items (RAM or GPU)
        if (is_array($component) && isset($component[0])) {
            foreach ($component as $item) {
                $total_price += intval($item['price']);
            }
        } else {
            $total_price += intval($component['price']);
        }
    }
}

// Determine whether to show chipset modal
$show_chipset_modal = !$selected_chipset && !isset($_SESSION['chipset_modal_shown']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreX Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="CoreX Computers offer the best computers available at the market">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/X_logo.jpg" />

    <!-- CSS
    ============================================ -->
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #amdBtn,
        #intelBtn {
            border-radius: 8px;
        }

        .selected-chipset {
            background-color: #28337e;
            color: white;
            border: 1px solid white;
        }

        .chipset {
            background-color: white;
            border: 1px solid #28337e;
            color: #28337e;
        }
    </style>

</head>

<body style="background-color: #e4e4e4;">
    <button data-bs-toggle='modal' id="hiddenModalBtn" data-bs-target='#exampleModal-Chipset' style="display: none;">Show Chipset Modal</button>
    @include('layouts.nav-2')
    <div class="h-[13dvh]"></div>


    <div class="flex justify-between px-6 max-lg:px-4 max-md:px-2 gap-3 max-sm:flex-col">
        <?php
        $nextPage = "?page=1";
        $prevPage = "?page=1";
        if ($pageNo == 1) {
            $nextPage = "?page=2";
            $prevPage = "?page=1";
        } elseif ($pageNo == 2) {
            $nextPage = "?page=3";
            $prevPage = "?page=1";
        } else if ($pageNo == 3) {
            $nextPage = "?page=4";
            $prevPage = "?page=2";
        } else if ($pageNo == 4) {
            $nextPage = "cart";
            $prevPage = "?page=3";
        }
        ?>
        <a href="<?= $prevPage ?>" class="light-blue-bg text-white py-2 px-4 rounded hover:bg-blue-600 flex items-center gap-2 text-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
            </svg>
            Previous
        </a>
        <a href="#" onclick="sendEmail()"  class="<?= $pageNo == 4 ? "light-blue-bg text-white py-2 px-4 rounded hover:bg-blue-600 flex items-center gap-2  text-center justify-center" : "hidden" ?>">
            Send to CoreX Computers 
        </a>
        <a href="<?= $nextPage ?>" class="light-blue-bg text-white py-2 px-4 rounded hover:bg-blue-600 flex items-center gap-2 text-center justify-center">
            <?= $pageNo == 4 ? "Add to Cart" : "Next" ?>
            <?= $pageNo == 4 ? "<i class='pe-7s-cart'></i>" : "
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-arrow-right-short' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8' />
                </svg>
            " ?>
        </a>
    </div>
    <div class="p-6 pt-3 flex items-center w-full max-lg:p-4 max-md:p-2 <?= $pageNo == 3 ? "hidden" : "" ?>  <?= $pageNo == 4 ? "hidden" : "" ?>">
        <div class="flex flex-col md:flex-row w-full">
            <!-- Left sidebar - Selected components -->
            <div class="w-full md:w-1/4 bg-white rounded-lg shadow-md p-2 max-md:mb-2 md:mr-2 flex flex-col max-h-[700px] overflow-y-auto red-custom-scroll pr-2">
                <div class="text-center mb-6">
                    <h1 class="text-xl font-bold">Build My PC</h1>
                </div>

                <div class="mb-4">
                    <h2 class="font-semibold mb-2">Chipset</h2>
                    <div class="flex gap-2">
                        <button id="amdBtn" class="light-blue-bg text-gray-100 py-1 px-4 <?= $selected_chipset == 'AMD' ? 'selected-chipset' : 'chipset' ?>" data-chipset="AMD" onclick="filterByChipset('AMD')">AMD</button>
                        <button id="intelBtn" class="light-blue-bg text-gray-100 py-1 px-4 <?= $selected_chipset == 'INTEL' ? 'selected-chipset' : 'chipset' ?>" data-chipset="INTEL" onclick="filterByChipset('INTEL')">Intel</button>
                    </div>
                </div>

                <div class="border-t pt-4">
                    <h2 class="font-semibold mb-2">Selected Components</h2>

                    <?php
                    $component_types;
                    if ($pageNo == 1) {
                        $component_types = $component_types_1;
                    } else {
                        $component_types = $component_types_2;
                    }

                    foreach ($component_types as $type_key => $type_info): ?>
                        <div class="mb-2 p-2 bg-gray-50 rounded">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-sm"><?= $type_info['label'] ?></div>
                                <?php if (!isset($_SESSION['selected_components'][$type_key])): ?>
                                    <a href="?component_type=<?= $type_key ?><?= $type_key == 'PROCESSOR' && $selected_chipset ? '&chipset=' . $selected_chipset : '' ?>&page=<?= $pageNo ?>" class="text-xs text-blue-600">Select</a>
                                <?php endif; ?>
                            </div>

                            <?php if (isset($_SESSION['selected_components'][$type_key])): ?>
                                <?php
                                // Check if multiple items (RAM or GPU)
                                if (is_array($_SESSION['selected_components'][$type_key]) && isset($_SESSION['selected_components'][$type_key][0])):
                                ?>
                                    <!-- Display multiple items for RAM or GRAPHIC CARDS -->
                                    <?php foreach ($_SESSION['selected_components'][$type_key] as $item): ?>
                                        <div class="flex items-center mb-2 bg-white p-1 rounded shadow-sm">
                                            <div class="w-1/4">
                                                <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-full">
                                            </div>
                                            <div class="w-3/4 pl-2">
                                                <div class="text-xs truncate" title="<?= $item['name'] ?>"><?= substr($item['name'], 0, 25) . (strlen($item['name']) > 25 ? '...' : '') ?></div>
                                                <div class="flex items-center justify-between mt-1">
                                                    <span class="text-xs font-semibold text-green-600">
                                                        Rs. <?= number_format(intval($item['price'])) ?>
                                                    </span>

                                                </div>

                                            </div>
                                            <a href="?remove_component=1&component_type=<?= $type_key ?>&component_id=<?= $item['id'] ?>&page=<?= $pageNo ?>" class="text-lg flex items-center" style="color: red;">
                                                <i class="pe-7s-trash p-1 bg-red-700 font-semibold rounded-md text-white mr-1"></i>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                    <a href="?component_type=<?= $type_key ?>&page=<?= $pageNo ?>" class="text-xs text-blue-600 block text-center mt-1">+ Add more</a>
                                <?php else: ?>
                                    <!-- Display single item for other components -->
                                    <div class="flex items-center bg-white p-1 rounded shadow-sm">

                                        <div class="w-1/4">
                                            <img src="<?= $_SESSION['selected_components'][$type_key]['image'] ?>" alt="<?= $_SESSION['selected_components'][$type_key]['name'] ?>" class="w-full">
                                        </div>
                                        <div class="w-3/4 pl-2">
                                            <div class="text-xs truncate" title="<?= $_SESSION['selected_components'][$type_key]['name'] ?>"><?= substr($_SESSION['selected_components'][$type_key]['name'], 0, 25) . (strlen($_SESSION['selected_components'][$type_key]['name']) > 25 ? '...' : '') ?></div>
                                            <div class="flex items-center justify-between mt-1">
                                                <span class="text-xs font-semibold text-green-600">
                                                    Rs. <?= number_format(intval($_SESSION['selected_components'][$type_key]['price'])) ?>
                                                </span>

                                            </div>
                                        </div>
                                        <a href="?remove_component=1&component_type=<?= $type_key ?><?= $selected_chipset ? '&chipset=' . $selected_chipset : '' ?>&page=<?= $pageNo ?>" class="text-lg flex items-center" style="color: red;">
                                            <i class="pe-7s-trash p-1 bg-red-700 font-semibold rounded-md text-white mr-1"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="mt-6">
                    <button onclick="resetBuild()" class="block text-center text-white py-2 w-full rounded" style="background-color:rgb(205, 53, 53);">Reset Build</button>
                </div>
            </div>

            <!-- Center section - Component selection -->
            <div class="w-full md:w-2/4 grid grid-cols-2 gap-2 max-md:mb-2 md:mr-2 max-h-[700px] overflow-y-auto red-custom-scroll pr-2">
                <?php
                $component_types;
                if ($pageNo == 1) {
                    $component_types = $component_types_1;
                } else {
                    $component_types = $component_types_2;
                }

                foreach ($component_types as $type_key => $type_info): ?>
                    <a href="?component_type=<?= $type_key ?><?= $selected_chipset ? '&chipset=' . $selected_chipset : '' ?>&page=<?= $pageNo ?>" class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center justify-center hover:bg-blue-50 transition duration-200 <?= $current_component_type == $type_key ? 'border-2 border-blue-500' : '' ?>">
                        <div class="mb-3 h-16 flex items-center justify-center">
                            <img src="<?= $type_info['image'] ?>" alt="<?= $type_info['label'] ?>" class="w-20 h-20">
                        </div>
                        <span class="text-center font-semibold text-lg">
                            <?= $type_info['label'] ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Right sidebar - Component selection -->
            <div class="w-full md:w-1/4 bg-white rounded-lg shadow-md p-2 flex flex-col max-h-[700px]">
                <?php if ($current_component_type): ?>
                    <h4 class="font-semibold mb-4">
                        <?= $current_component_type == 'RAM' && $selected_chipset ? "ADD MORE " : "" ?>
                        <?= $current_component_type == 'GRAPHIC CARDS' && $selected_chipset ? "ADD MORE " : "" ?>
                        <?= $component_types_1[$current_component_type]['label'] ?? $current_component_type ?>
                        <?= $current_component_type == 'PROCESSOR' && $selected_chipset ? "(" . $selected_chipset . ")" : "" ?>
                    </h4>

                    <?php if (empty($filtered_products)): ?>
                        <p class="text-gray-500">No products available for this category.</p>
                    <?php else: ?>
                        <div class="space-y-4 overflow-y-auto flex-1 red-custom-scroll pr-2">
                            <?php foreach ($filtered_products as $product): ?>
                                <div class="border-b pb-4">
                                    <div class="flex mb-2">
                                        <div class="w-1/3">
                                            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-full">
                                        </div>
                                        <div class="w-2/3 pl-3">
                                            <h3 class="text-xs font-semibold" style="font-size: medium;"><?= $product['name'] ?></h3>
                                            <p class="text-sm text-red-600 font-semibold mt-1">
                                                Rs. <?=  $product['dis_price'] ?>
                                            </p>
                                            <div class="mt-2">
                                                <span class="text-xs <?= $product['in_stock'] == 'In stock' ? 'text-green-600' : 'text-red-600' ?>">
                                                    <?= $product['in_stock'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button onclick="window.location.href='?select_component=1&component_id=<?= $product['id'] ?>&component_type=<?= $current_component_type ?><?= $selected_chipset ? '&chipset=' . $selected_chipset : '' ?>&page=<?= $pageNo ?>';"
                                            class="block w-full text-center text-white py-1 rounded text-sm dark-blue-bg <?= $product['in_stock'] == 'Out of Stock' ? 'opacity-50 cursor-not-allowed' : '' ?>"
                                            <?= $product['in_stock'] == 'Out of Stock' ? 'disabled' : '' ?>>
                                            <?= (in_array(strtoupper($current_component_type), ['RAM', 'GRAPHIC CARDS'])) ? 'Add' : 'Select' ?>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="bg-gray-100 md:p-4 p-2 border-t">
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="text-sm text-gray-700">TOTAL:</div>
                                    <div class="text-lg font-bold">Rs. <?= number_format($total_price) ?></div>
                                    <div class="text-xs text-gray-500">Monthly payments available</div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="flex items-center justify-center h-full rounded-lg relative" style="background: url(assets/images/banner/gaming_1.jpg); background-size: cover; background-position: center;">
                        <div class="absolute w-full h-full left-0 top-0 bg-black/40 rounded-lg"></div>
                        <p class="text-white font-bold px-3 text-center relative z-10">Select a component type to view products</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="p-2 md:pt-0 max-lg:p-4 max-md:p-2 <?= $pageNo == 3 ? "" : "hidden" ?>">
        <div class="md:max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 text-center">Customer Information</h2>
            <form id="myForm" class="space-y-4">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
            <input
                type="text"
                id="firstName"
                name="firstName"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Kasun"
                required>
        </div>
        <div>
            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
            <input
                type="text"
                id="lastName"
                name="lastName"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Jayaweera"
                required>
        </div>
    </div>

    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
        <input
            type="text"
            id="address"
            name="address"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="123 Main St, Kandy"
            required>
    </div>

    <div>
        <label for="phoneNumber" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
        <input
            type="tel"
            id="phoneNumber"
            name="phoneNumber"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="(+94) 11 123 4567"
            required>
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input
            type="email"
            id="email"
            name="email"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="kasun.jayaweera@example.com"
            required>
    </div>

    <button type="submit" class="light-blue-bg text-white px-3 rounded w-full">Submit</button>
</form>

<script>
    document.getElementById('myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form values
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const address = document.getElementById('address').value;
        const phoneNumber = document.getElementById('phoneNumber').value;
        const email = document.getElementById('email').value;

        // Create an object to hold the form data
        const formData = {
            firstName: firstName,
            lastName: lastName,
            address: address,
            phoneNumber: phoneNumber,
            email: email
        };

        // Store the form data in localStorage
        localStorage.setItem('formData', JSON.stringify(formData));

        // Optionally, you can display a success message or redirect
        alert('Form data saved');
    });
</script>

        </div>
    </div>


    <script>
    // Pass PHP session data to JavaScript
    const selectedComponents = <?php echo json_encode($_SESSION['selected_components'] ?? []); ?>;
    const currentDate = '<?php echo date('F d, Y'); ?>'; // Current date for invoice
</script>



<div class="max-lg:p-4 p-2 flex justify-center <?= $pageNo == 4 ? "" : "hidden" ?>">
    <!-- Print Button -->
    <div class="fixed bottom-4 right-4 z-50">
            <button onclick="downloadPDF()" class=" font-bold py-2 px-4 rounded-full shadow-lg flex items-center gap-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Download Invoice
            </button>
        </div>
    

    <div class="bg-white shadow-lg rounded-lg md:max-w-4xl w-full overflow-hidden" id="invoiceContent">
            <!-- Invoice Header -->
            <div class="bg-gray-800 text-white p-3">
                <div class="flex max-md:flex-col justify-between items-center max-md:text-center gap-6">
                    <div class="flex items-center max-md:flex-col">
                        <img src="assets/images/logo/X_logo-r.png" alt="" class="w-20 h-20">
                        <div>
                            <p class="text-2xl font-bold uppercase text-white">CoreX Computers</p>
                            <p class="uppercase">Computer Arcade & Technologies (PVT) Ltd</p>
                        </div>
                    </div>
                    <div class="md:text-right">
                        <p class="font-bold">INVOICE</p>
                        <p class="text-gray-300">Invoice #INV-2025-001</p>
                        <p id="date" class="text-gray-300">2025-04-15</p>
                    </div>
                </div>
            </div>

            <!-- Customer Information -->
            <div class="p-3 border-b">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600 font-semibold mb-2">Bill To:</p>
                        <p id="customerName" class="font-medium">John Doe</p>
                        <p id="customerEmail">john.doe@example.com</p>
                        <p id="customerPhone">+94 123 456 789</p>
                        <p id="customerAddress">123 Main Street, Colombo</p>
                        <p>Sri Lanka</p>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600 font-semibold mb-2">Invoice Details:</p>
                        <p><span class="font-medium">Date Issued:</span> <span id="dateIssued">2025-04-15</span></p>
                        <p><span class="font-medium">Due Date:</span> <span id="dueDate">2025-04-30</span></p>
                        <p><span class="font-medium">Payment Terms:</span> Net 15</p>
                    </div>
                </div>
            </div>

            <!-- Product Table -->
            <div class="p-2">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ITEM NAME</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PRICE</th>
                        </tr>
                    </thead>
                    <tbody id="invoiceItems" class="bg-white divide-y divide-gray-200">

                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="p-2 bg-gray-50">
                <div class="flex justify-end">
                    <div class="w-full md:w-1/2">
                        <div class="flex justify-between py-2 border-b">
                            <span class="font-medium">Subtotal:</span>
                            <span id="subtotal">Rs. 155,000</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="font-medium">Tax (18%):</span>
                            <span id="tax">Rs. 27,900</span>
                        </div>
                        <div class="flex justify-between py-2 border-b">
                            <span class="font-medium">Shipping:</span>
                            <span>Rs. 500</span>
                        </div>
                        <div class="flex justify-between py-3 font-bold text-lg">
                            <span>Total:</span>
                            <span id="total">Rs. 183,400</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Information and Notes -->
            <div class="p-3 border-t">
                <div class="flex gap-1 items-center">
                    <p class="font-semibold">Warranty Period:</p>
                    <p>2 Years</p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="font-semibold">Payment Information:</p>
                        <p>Bank: BOC</p>
                        <p>Account Name: CoreX Computers</p>
                        <p>Account Number: XXXX-XXXX-XXXX-1334</p>
                        <p>IFSC Code: GLOB0002312</p>
                    </div>
                    <div>
                        <p class="font-semibold">Notes:</p>
                        <p class="text-gray-600 text-justify">Thank you for your business. Please make payment by the due date. For any queries regarding this invoice, please contact our support team at support@corexcomputers.com or call +94 (77) 921-2312.</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-4 bg-gray-800 text-white text-right text-sm flex justify-between max-sm:flex-col max-sm:items-center gap-3">
                <ul class="w-fit flex gap-6 items-end">
                    <li><a href="#" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg></a></li>
                    <li><a href="#" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478 .972.923 1.417.445.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 1 1 0-5.334"/></svg></a></li>
                    <li><a href="#" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/></svg></a></li>
                    <li><a href="#" class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16"><path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/></svg></a></li>
                </ul>
                <ul class="flex flex-col gap-2">
                    <li class="flex items-center gap-2 justify-end max-sm:justify-center">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +94 3242 45678
                    </li>
                    <li class="flex items-center gap-2 justify-end max-sm:justify-center">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        www.corexcomputers.lk
                    </li>
                    <li class="flex items-center gap-2 justify-end max-sm:justify-center">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        corexcomputers@gmail.com
                    </li>
                </ul>
            </div>
        </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const invoiceContent = document.getElementById('invoiceContent');
    
    // Temporarily hide the print button to exclude it from the PDF
    const printButton = document.querySelector('.fixed.bottom-4.right-4');
    printButton.style.display = 'none';
    
    // Create a temporary clone of the invoice content to modify styles without affecting the page
    const tempDiv = invoiceContent.cloneNode(true);
    document.body.appendChild(tempDiv);
    tempDiv.style.position = 'absolute';
    tempDiv.style.left = '-9999px';
    
    // Fix color styles
    const allElements = tempDiv.querySelectorAll('*');
    allElements.forEach(el => {
        const style = window.getComputedStyle(el);
        if (style.backgroundColor && style.backgroundColor.includes('oklch')) {
            el.style.backgroundColor = '#ffffff';
        }
        if (style.color && style.color.includes('oklch')) {
            el.style.color = '#666666';
        }
        if (style.borderColor && style.borderColor.includes('oklch')) {
            el.style.borderColor = '#cccccc';
        }
    });
    
    // Set header and footer background color explicitly
    const grayBgElements = tempDiv.querySelectorAll('.bg-gray-800');
    grayBgElements.forEach(el => {
        el.style.backgroundColor = '#1f2937';
    });
    
    // Optimize layout for PDF by adjusting some element sizes
    // This helps reduce the overall height when possible
    const optimizeLayout = () => {
        // Reduce some margins and paddings
        allElements.forEach(el => {
            if (window.getComputedStyle(el).padding && 
                parseFloat(window.getComputedStyle(el).padding) > 8) {
                el.style.padding = '8px';
            }
        });
        
        // Make table rows more compact if there are many of them
        const tableRows = tempDiv.querySelectorAll('tbody tr');
        if (tableRows.length > 5) {
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                cells.forEach(cell => {
                    cell.style.paddingTop = '6px';
                    cell.style.paddingBottom = '6px';
                });
            });
        }
    };
    
    // Apply layout optimizations
    optimizeLayout();
    
    html2canvas(tempDiv, {
        scale: 2,
        useCORS: true,
        backgroundColor: '#ffffff',
        logging: false
    }).then(canvas => {
        // Remove temporary div
        document.body.removeChild(tempDiv);
        
        // Restore the print button visibility
        printButton.style.display = 'block';
        
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: 'a4'
        });
        
        const pageWidth = 210; // A4 width in mm
        const pageHeight = 297; // A4 height in mm
        const margin = 2;
        const contentWidth = pageWidth - 2 * margin;
        const contentHeight = pageHeight - 2 * margin;
        
        const imgWidth = contentWidth;
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        
        // Check if the image height exceeds the page height
        if (imgHeight > contentHeight) {
            // Find natural page break points - for invoices, usually after sections
            const pageBreakElements = [
                '.bg-gray-50', // After table or summary sections
                '.border-t',   // After horizontal dividers
                '.border-b'    // After horizontal dividers
            ];
            
            let breakPoints = [];
            
            // Get potential break points by finding elements that could serve as natural dividers
            pageBreakElements.forEach(selector => {
                tempDiv.querySelectorAll(selector).forEach(el => {
                    // Calculate the element's position relative to the top of the invoice
                    let offsetTop = 0;
                    let currentEl = el;
                    while (currentEl && currentEl !== tempDiv) {
                        offsetTop += currentEl.offsetTop;
                        currentEl = currentEl.offsetParent;
                    }
                    
                    // Add this position as a potential break point
                    breakPoints.push(offsetTop);
                });
            });
            
            // Sort break points and remove duplicates
            breakPoints = [...new Set(breakPoints)].sort((a, b) => a - b);
            
            // Calculate how many content pixels fit on one page
            const pixelsPerPage = (contentHeight * canvas.width) / contentWidth;
            
            // Find optimal page breaks
            let currentPage = 1;
            let currentY = 0;
            let pageBreaks = [];
            
            // Add start point
            pageBreaks.push(0);
            
            // Find where to break pages
            while (currentY < canvas.height) {
                const nextPageY = currentY + pixelsPerPage;
                
                // If we'd reach the end, we're done
                if (nextPageY >= canvas.height) {
                    break;
                }
                
                // Find the best break point near where the page would naturally end
                let bestBreakPoint = null;
                let minDistance = pixelsPerPage; // Initialize with maximum possible distance
                
                for (const breakPoint of breakPoints) {
                    // Skip points before current position or beyond next page
                    if (breakPoint <= currentY || breakPoint > nextPageY + pixelsPerPage * 0.1) {
                        continue;
                    }
                    
                    const distance = Math.abs(breakPoint - nextPageY);
                    if (distance < minDistance) {
                        minDistance = distance;
                        bestBreakPoint = breakPoint;
                    }
                }
                
                // If we found a good break point, use it, otherwise use the calculated position
                currentY = bestBreakPoint || nextPageY;
                pageBreaks.push(currentY);
                currentPage++;
            }
            
            // Add the endpoint if not already added
            if (pageBreaks[pageBreaks.length - 1] < canvas.height) {
                pageBreaks.push(canvas.height);
            }
            
            // Create each page
            for (let i = 0; i < pageBreaks.length - 1; i++) {
                if (i > 0) {
                    pdf.addPage();
                }
                
                const sourceY = pageBreaks[i];
                const sourceHeight = pageBreaks[i + 1] - pageBreaks[i];
                
                // Skip if section height is 0
                if (sourceHeight <= 0) continue;
                
                // Create a new canvas for this part
                const partCanvas = document.createElement('canvas');
                partCanvas.width = canvas.width;
                partCanvas.height = sourceHeight;
                const ctx = partCanvas.getContext('2d');
                
                // Draw the appropriate portion of the original canvas
                ctx.drawImage(
                    canvas, 
                    0, sourceY, canvas.width, sourceHeight, 
                    0, 0, canvas.width, sourceHeight
                );
                
                // Calculate height for this part
                const partImgHeight = (sourceHeight * imgWidth) / canvas.width;
                
                // Add this part to the PDF
                pdf.addImage(
                    partCanvas.toDataURL('image/png'), 
                    'PNG', 
                    margin, margin, 
                    imgWidth, partImgHeight
                );
            }
        } else {
            // The content fits on a single page
            pdf.addImage(imgData, 'PNG', margin, margin, imgWidth, imgHeight);
        }
        
        // Save the PDF
        pdf.save(`invoice_INV-2025-001_${new Date().toISOString().split('T')[0]}.pdf`);
    }).catch(error => {
        console.error('Error generating PDF:', error);
        alert('Failed to generate PDF. Please try again.');
        
        // Cleanup
        if (document.body.contains(tempDiv)) {
            document.body.removeChild(tempDiv);
        }
        printButton.style.display = 'block';
    });
}
</script>

<script>
function sendEmail() {
    // Show loading indicator
    const sendButton = document.querySelector('[onclick="sendEmail()"]');
    const originalText = sendButton.innerHTML;
    sendButton.innerHTML = 'Sending...';
    sendButton.disabled = true;
    
    // Get all invoice data
    const invoiceData = {
        customerName: document.getElementById('customerName').textContent,
        customerEmail: document.getElementById('customerEmail').textContent,
        customerPhone: document.getElementById('customerPhone').textContent,
        customerAddress: document.getElementById('customerAddress').textContent,
        invoiceNumber: document.querySelector('.text-gray-300').textContent.replace('Invoice #', ''),
        dateIssued: document.getElementById('dateIssued').textContent,
        dueDate: document.getElementById('dueDate').textContent,
        subtotal: document.getElementById('subtotal').textContent,
        tax: document.getElementById('tax').textContent,
        total: document.getElementById('total').textContent,
        invoiceItems: []
    };

    // Get all invoice items
    const itemRows = document.getElementById('invoiceItems').querySelectorAll('tr');
    itemRows.forEach(row => {
        const columns = row.querySelectorAll('td');
        invoiceData.invoiceItems.push({
            id: columns[0].textContent,
            name: columns[1].textContent,
            price: columns[2].textContent
        });
    });

    console.log('Sending data:', invoiceData);

    // Send AJAX request to Laravel controller
    fetch('/send-invoice-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json' // This tells Laravel we expect JSON back
        },
        body: JSON.stringify(invoiceData)
    })
    .then(response => {
        if (!response.ok) {
            // If the server returned an error, capture the full response
            return response.text().then(text => {
                console.error('Server response:', text);
                throw new Error('Server returned ' + response.status + ': ' + text);
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data);
        alert('Invoice sent successfully to admin and customer');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending the invoice: ' + error.message);
    })
    .finally(() => {
        // Reset button
        sendButton.innerHTML = originalText;
        sendButton.disabled = false;
    });
}
</script>

<!-- Print Styles (will only be applied when printing) -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #invoiceContent, #invoiceContent * {
            visibility: visible;
        }
        #invoiceContent {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 0;
            box-shadow: none;
        }
        .fixed {
            display: none !important;
        }
        /* Ensure background colors are printed */
        .bg-gray-800 {
            background-color: #1f2937 !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .bg-gray-50 {
            background-color: #f9fafb !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .text-white {
            color: #ffffff !important;
        }
        .text-gray-300 {
            color: #d1d5db !important;
        }
    }
</style>

<script>
    function printInvoice() {
        window.print();
    }
    
    // Set current date
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const formattedDate = today.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
        
        // Set dates in the invoice
        document.getElementById('date').textContent = formattedDate;
        document.getElementById('dateIssued').textContent = formattedDate;
        
        // Set due date (15 days from today)
        const dueDate = new Date();
        dueDate.setDate(today.getDate() + 15);
        document.getElementById('dueDate').textContent = dueDate.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Include html2canvas -->
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/dom-to-image@2.6.0/dist/dom-to-image.min.js"></script>   
    <script>
        function generateInvoicePDF() {
            // Initialize jsPDF
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Get the invoice content element
            const invoiceContent = document.getElementById('invoiceContent');

            // Use html2canvas to render the invoice content as an image
            html2canvas(invoiceContent, {
                scale: 2, // Increase scale for better quality
                useCORS: true // Enable CORS for images
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const imgWidth = 190; // A4 width in mm (210) minus margins
                const pageHeight = 295; // A4 height in mm
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;

                let position = 10; // Top margin

                // Add the image to the PDF
                doc.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                // Handle multiple pages if the content is too long
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight + 10;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Save the PDF
                doc.save('invoice_INV-2025-001.pdf');
            }).catch(error => {
                console.error('Error generating PDF:', error);
                alert('An error occurred while generating the PDF. Please try again.');
            });
        }
    </script>

    <script>
        function sendEmailAdmin() {
    const invoiceContent = document.getElementById('invoiceContent').outerHTML;
    
    fetch('/send-invoice-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ invoice_html: invoiceContent })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Invoice sent successfully!');
        } else {
            alert('Failed to send invoice: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while sending the invoice.');
    });
}
    </script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Populate customer data from localStorage
    const formData = JSON.parse(localStorage.getItem('formData')) || {};
    document.getElementById('customerName').textContent = `${formData.firstName || ''} ${formData.lastName || ''}`.trim() || 'N/A';
    document.getElementById('customerEmail').textContent = formData.email || 'N/A';
    document.getElementById('customerPhone').textContent = formData.phoneNumber || 'N/A';
    document.getElementById('customerAddress').textContent = formData.address || 'N/A';

    // Set dates
    document.getElementById('date').textContent = `Date: ${currentDate}`;
    document.getElementById('dateIssued').textContent = currentDate;
    const dueDate = new Date();
    dueDate.setDate(dueDate.getDate() + 15); // Due date is 15 days from now
    document.getElementById('dueDate').textContent = dueDate.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });

    // Populate invoice items from session data
    const invoiceItems = document.getElementById('invoiceItems');
    let subtotal = 0;

    if (Object.keys(selectedComponents).length > 0) {
        let index = 1;
        for (const type in selectedComponents) {
            const components = Array.isArray(selectedComponents[type]) ? selectedComponents[type] : [selectedComponents[type]];
            components.forEach(component => {
                const price = parseInt(component.price) || 0;
                subtotal += price;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">INV-2025-${String(index).padStart(3, '0')}</td>
                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">${component.name}</td>
                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rs. ${price.toLocaleString()}</td>
                `;
                invoiceItems.appendChild(row);
                index++;
            });
        }
    } else {
        const row = document.createElement('tr');
        row.innerHTML = `<td colspan="3" class="px-4 py-4 text-center text-sm text-gray-500">No items selected</td>`;
        invoiceItems.appendChild(row);
    }

    // Calculate and display summary
    const taxRate = 0.18; // 18% tax
    const shipping = 500;
    const tax = subtotal * taxRate;
    const total = subtotal + tax + shipping;

    document.getElementById('subtotal').textContent = `Rs. ${subtotal.toLocaleString()}`;
    document.getElementById('tax').textContent = `Rs. ${tax.toLocaleString()}`;
    document.getElementById('total').textContent = `Rs. ${total.toLocaleString()}`;
});
</script>

    <!-- footer -->
    @include('layouts.footer2')

    <!-- modals -->
    @include('layouts.modals')

    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/scrollUp.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/mailchimp-ajax.js"></script>
    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>

    <script>
        function filterByChipset(chipset) {
            const url = new URL(window.location.href);
            const componentType = url.searchParams.get('component_type') || '';

            // Create a new URL with chipset and maintain component type if exists
            const newUrl = new URL(window.location.origin + window.location.pathname);
            newUrl.searchParams.set('chipset', chipset);

            if (componentType) {
                newUrl.searchParams.set('component_type', componentType);
            }

            window.location.href = newUrl.toString();
        }

        function resetBuild() {
            if (confirm("Are you sure you want to reset this build?")) {
                window.location.href = "?reset_build=1";
            }
        }
    </script>

    <?php
    // Add this script only if chipset modal should be shown
    if ($show_chipset_modal):
    ?>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('hiddenModalBtn').click();
            });
        </script>
    <?php endif; ?>
</body>

</html>