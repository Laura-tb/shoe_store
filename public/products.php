<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('client');

// Cargar conexión y modelo (ajusta las rutas si no coinciden)
require __DIR__ . '/../app/config/db.php';          // aquí debes crear $db (mysqli)
require __DIR__ . '/../app/models/ProductModel.php';

// Obtener productos de BD
$products = ProductModel::getAll($db);
?>

<!DOCTYPE html>
<html lang="es">

<?php
$title = "Productos";
include('../app/views/layout/head.php');
?>

<body>
    <div class="page">
        <?php
        include('../app/views/layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <div class="container">

                    <section class="products-section">
                        <div class="container">
                            <header class="products-header">
                                <h1 class="products-title">Nuestra Colección</h1>
                                <p class="products-subtitle">
                                    Explora los últimos modelos y encuentra tu par perfecto.
                                </p>
                            </header>

                            <div class="products-grid">

                                <!--<article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBwgznSpWoFg7gk00FlvZv4QsJ1E1H9PIRxoCESYVU1J5Zb4970UWKGwVv2jOBqY924pEJ78jjPtl6M6ve_bPxmly1RGHxGlGZjxEuKiUB8TNxfAp2dM08eXym1FQczIviRTxY92-znDu3tggEldP2rSBvwP32gbT3ZLPkpV3e8jaT1dbxOiUNW8BzykrO-yiTj2xkT28CPHYf-W0DYnou_EOky5R8Ny2QC69BUZQnVyHKWyHY3-CjAccQYEWFQ-n81bkgCj9ebIhjM"
                                            alt="UrbanStride Pro" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">120,00€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">23</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD7o4HwUW2yf2HJQubgsqZMyZGSNgypw-u2t9CBK5I0Nni1mmNj8WWmizUmEcw_cS6CfOmabwXIwEqx3HmsiYvZ6_1Vb2BmDC_MOTUHqibCeIDUlybBk5duZCsLVZB7lBsNF-Y08xuhEjE5bawNwqFqfjXZqAQfJKaO1LckwhQiVMOAIxvvrv35Z2GyTNiyrTcxEwXMUEWYHL5rXAB3d1CGahZKRxfQxTB2z-0hh2lfg9v5YomA4U5CwBnmdkEI1bvR4cFVvn152wRL"
                                            alt="FlexRunner" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">95,50€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">15</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdn5Fzq9bCcwf_mBIHxEMYPCjR7JQe-iFZE-6oBz7rvMcsgS43PS9rP4GAuvfQLoCsS-AL2QBqlbGBNqGtDlZohfU0yae2ZIr3PoNNrLAeIhxwpIO3aSS_oioaNe9qB91P1bkPF1WCFJGCAlSf_F5GNua6WcHKuVjjXHX_SJ1DROA9XgjwZCT8FTva8yXjqV5YgbtrvZjYwqW582LPhttqMR94if39MJPWe4xtRuZ_mJ-C9DTAlWq39ai3VPHaO6Ni9J4MqozzAypm"
                                            alt="AeroBoost X" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">150,00€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">8</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD7OGdXL_NhkKHqdQcsdAFk4csKy6Pp50XizdfPo2eprr5ZTa4JBTzwkpx0DNuzTcX-ij-uYwdl1sbkfd4zykNYa94so57deesHcivW1DyXDlJNQZxjp8M3YgjQlnW9eO4Zp5kLA_sqEvdvzDr_UNdeR17q-JE0fdMLYQMjyaOQBpZDtuMVC1EhZUhY98SNd-RsnAp7QZiqUwnHs8uW1iNSSuynMo9gFpYD5Mns1QxBohEzNwmChQs1h6Rt-x9_9glP_9S6KyO-8S1z"
                                            alt="CityScape Lite" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">89,99€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">42</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaSUAaLOwA3J57rW4vtfeY1Z0o1NrDZ_dBiGWUeJKJHneCjQuyXARSEA5ZCftbx2GKQCNG_rWFIZfb9PR3UkEKqUJHYfmQZ9ao6zlntr49Otrmb40GWm3UfQvElc06-hBdhdjCGRZN7hACEV4eTQH1ypQFXXV5ywoe-vsNzm9hLfql95hswc0_KuGlpsrm5-E4Th7MkpL57sgkiN65bPdcMjtbhRHFGYPEeQDMGqFOiiGc7RthbnoX92KiCfHHeG19fpXTSDvpBGDI"
                                            alt="TrailBlazer" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">110,00€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">19</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDh68UZbMXF1UqTLqnHszsLbwFV9l2HmNwgSKc7ZL2pbSa5MiVGv-mGZGMHJU-cNUKK7Xn0OAt_sxwQjVtpvXF0FGgyoTATQAPR1375EhlSmHOIyIgGsdL2B3oNZFsZ1zQcOfhYf_8qhaI4J6eMU4pzGR9ki16_NJRC6-kkE-tZpB6fXu6Gp3VLpLR-Nx6cMBmyP6oVUvHGK-YOlChi4Rh9BnpADm30eBQ-5j0lm3siFGRO9EOm8oxI3RLkTNfj6xGAa2T6zhmIFVqU"
                                            alt="Velocity Knit" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">135,00€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">31</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsqaITY0kGGJAN2Dif0fq4XaUlEqzqDNmj9YbOfDYJZTIIVkYknW0uqOr5qKP9ioa7x0kcjS5xORKRfcDXidpiIh_jdDgs6Qd_OvNkvXw4trsw2VRrKCj7FjOmkGxg28-gY4SGFo1kkm58VQ7mq-sMVkJGpmtVCUwGSPJupYDzo2oFmXdYsqZGB0IsuMSwk4bZhZNKqNrNMvFF7NA3Hshqc7NOd2nrBusYr8qcKc5Bzr_tr7EUadIIs2VZ1mmx8WQylrs4Nxsa60cR"
                                            alt="EcoStep Casual" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">75,00€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">50</span>
                                        </div>
                                    </div>
                                </article>

                                <article class="product-card">
                                    <div class="product-image-wrapper">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUssdlblN89VGtyIuoK8A7p78lmwVsbr10f6nZagUNP3ZGmA43zeo52kOE7DYnilRJcvdemR-ud3mo2xHHXo05wikpCFA91L93HiTxnGopTLd8icz9m6e1DUWtOGVV-oIEM8NyqDAfyx5aZ0kyUd24aRVnY48KzfkGOwzHw5fU96zm-jJ9f2anPJWWfKi05nucv1YyrNa2uEKhcWeR2S-XcUt9O59kvCUb_It4nKizpBBg3tClNIYii8pfGzVY2EsnwioeLmlhzLTG"
                                            alt="Apex Power" class="product-image">
                                    </div>
                                    <div class="product-body">
                                        <div class="product-header-body">
                                            <h3 class="product-name">Zapatilla</h3>
                                            <button class="add-cart-btn" aria-label="Añadir al carrito">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="product-price">180,00€</p>
                                        <div class="product-stock">
                                            <span>Stock disponible:</span>
                                            <span class="product-stock-value">5</span>
                                        </div>
                                    </div>
                                </article>-->

                                <?php if (empty($products)): ?>
                                    <p>No hay productos disponibles.</p>
                                <?php else: ?>
                                    <?php foreach ($products as $product): ?>
                                        <article class="product-card">
                                            <div class="product-image-wrapper">
                                                <img src="img/<?php echo htmlspecialchars($product['image_product']); ?>"
                                                    alt="<?php echo htmlspecialchars($product['name_product']); ?>"
                                                    class="product-image">
                                            </div>
                                            <div class="product-body">
                                                <div class="product-header-body">
                                                    <h3 class="product-name">
                                                        <?php echo htmlspecialchars($product['name_product']); ?>
                                                    </h3>
                                                    <button class="add-cart-btn"
                                                        aria-label="Añadir al carrito"
                                                        data-id="<?php echo (int)$product['id_product']; ?>">
                                                        
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="#ffffff"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <p class="product-price">
                                                    <?php
                                                    echo number_format(
                                                        (float)$product['price_product'],
                                                        2,
                                                        ',',
                                                        '.'
                                                    ); ?>€
                                                </p>

                                                <div class="product-stock">
                                                    <span>Stock disponible:</span>
                                                    <span class="product-stock-value">
                                                        <?php echo (int)$product['stock_product']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </section>

                </div>
            </section>
        </main>

        <?php
        include('../app/views/layout/footer.php');
        ?>
    </div>

</body>

</html>