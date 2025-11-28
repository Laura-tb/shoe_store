<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('client');

?>

<!DOCTYPE html>
<html lang="es">

<?php
$title = "Cesta";
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
            
                            <header class="cart-header">                              
                                <h1 class="cart-title">Cesta</h1>
                            </header>

                            <!-- Layout principal -->
                            <div class="cart-layout">
                                <!-- Lista de productos -->
                                <section class="cart-items-card">
                                    <!-- Item 1 -->
                                    <article class="cart-item">
                                        <div class="cart-item-main">
                                            <div class="cart-item-image"
                                                style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuCInZ5hpAH5Z9KCR7Rj5WZR32s5Yg6zb9zWgpBTSZdYG3QBg0dkgtVPG0AaaB2ytzaiDJticYe8T9qm_YccaJZKfCAwJ0cXdGvRFdPqQ5FvSUq1oE8YvDqccLHi06Iz4CkeFUCPYjP1QULQfyZ_huzWENwyD6RkBNtJG_mO_qNGQplXAsNTCR5FyxE82kkqqQelwkN2n69VD9rbnm6GOiycsSCEPpkecb2euLs6ss3m4oA85X7s9mgiXc10LjJgwhcRv_DWZkc-Cqno');">
                                            </div>
                                            <div class="cart-item-text">
                                                <p class="cart-item-name">Zapatilla Deportiva Air Max</p>
                                              
                                                <button class="cart-item-remove" type="button">Eliminar</button>
                                            </div>
                                        </div>
                                        <div class="cart-item-side">
                                            <p class="cart-item-price">120,00€</p>
                                            <div class="cart-qty">
                                                <button type="button" class="qty-btn">−</button>
                                                <input type="number" class="qty-input" value="1" min="1">
                                                <button type="button" class="qty-btn">+</button>
                                            </div>
                                        </div>
                                    </article>

                                    <!-- Item 2 -->
                                    <article class="cart-item">
                                        <div class="cart-item-main">
                                            <div class="cart-item-image"
                                                style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuAyolQe90iOJeTY2eT-bpae3Pv-qSGiaMbh-jcHCYZLfjqtyxo9A9fvGohmPi27XI2PpLfiBt3U5SFPq_vBBQJ56A9c_tqpE_68rQyaBXHEKRBD0zZkK67_G8OHXjOzM6QMaxpiKpGMrPzBf6IQYmp1chDPULlBA-5MqzT2CN45aVAkcsMHVSgpIjgPptjrWx3MJEArxqYw1Ctnw7-LirvEb0KksqW3LfrdtRUr794ec2VNHvmkUSmOIH_tVm1tvU7LFSf6RC7P8uIs');">
                                            </div>
                                            <div class="cart-item-text">
                                                <p class="cart-item-name">Zapatilla Running Pro</p>
                                                
                                                <button class="cart-item-remove" type="button">Eliminar</button>
                                            </div>
                                        </div>
                                        <div class="cart-item-side">
                                            <p class="cart-item-price">95,00€</p>
                                            <div class="cart-qty">
                                                <button type="button" class="qty-btn">−</button>
                                                <input type="number" class="qty-input" value="1" min="1">
                                                <button type="button" class="qty-btn">+</button>
                                            </div>
                                        </div>
                                    </article>

                                    <!-- Item 3 -->
                                    <article class="cart-item">
                                        <div class="cart-item-main">
                                            <div class="cart-item-image"
                                                style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuDdaPFtT_NgSJ2pqF8T5Jr8Ab2fhpbrO2QrWUSt77JpSIU3Fuf9QpASiE5acvMUlU7GKWW6zfMze_f6nzj2dBpYwpPJLs5lGIb4xzI1bDznpN_Yl-AmG8xAobsNpJwDsrSH2bTk-pnG6bOZ1sIymN_ew1vwu_VYiCq4Src_oiPqM1OapII1nRe1-P6QY0p9x9qkQLBKHSB3vi8C2LH-EuiqPxn5nLGpJy8q9OgVly9URDclcZEMe0EkYl-QEVM0lR1_vIRdrsge-XKy');">
                                            </div>
                                            <div class="cart-item-text">
                                                <p class="cart-item-name">Bota Urbana Classic</p>
                                               
                                                <button class="cart-item-remove" type="button">Eliminar</button>
                                            </div>
                                        </div>
                                        <div class="cart-item-side">
                                            <p class="cart-item-price">150,00€</p>
                                            <div class="cart-qty">
                                                <button type="button" class="qty-btn">−</button>
                                                <input type="number" class="qty-input" value="1" min="1">
                                                <button type="button" class="qty-btn">+</button>
                                            </div>
                                        </div>
                                    </article>
                                </section>

                                <!-- Resumen -->
                                <aside class="cart-summary">
                                    <h2 class="cart-summary-title">Resumen del Pedido</h2>

                                    <div class="cart-summary-lines">
                                        <div class="cart-summary-row">
                                            <p>Subtotal</p>
                                            <p class="cart-summary-value">365,00€</p>
                                        </div>
                                        <div class="cart-summary-row">
                                            <p>Envío</p>
                                            <p class="cart-summary-value">Gratis</p>
                                        </div>
                                    </div>

                                    <div class="cart-summary-total">
                                        <p>Total</p>
                                        <p>365,00€</p>
                                    </div>

                                    <button type="button" class="cart-summary-btn">
                                        Finalizar Compra
                                    </button>

                            
                                </aside>
                            </div>                     
                </div>
            </section>
        </main>


        <?php
        include('../app/views/layout/footer.php');
        ?>
    </div>

</body>

</html>