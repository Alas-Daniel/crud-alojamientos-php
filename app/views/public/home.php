<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeStay - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/crud-alojamientos/assets/css/landing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            padding-top: 56px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php include __DIR__ . "/../layouts/header.php"; ?>

    <!-- Hero -->
    <section class="hero-section text-light position-relative d-flex align-items-center"
        style="background: url('https://res.cloudinary.com/drztldzvn/image/upload/v1758756242/terraza2_jnnhqp.jpg') no-repeat center center; 
        background-size: cover; 
        min-height: 90vh;">

        <div class="overlay position-absolute top-0 start-0 w-100 h-100"
            style="background-color: rgba(0,0,0,0.6);"></div>

        <div class="container-lg text-center position-relative" style="z-index: 1;">
            <h1 class="display-4 fw-bold mb-4">Encuentra tu alojamiento ideal</h1>
            <p class="fs-5 mb-4">
                Hoteles, cabañas y apartamentos con garantía de calidad y precio justo.
                <br>Disfruta de confort y calidad con precios justos.
            </p>
            <a href="#alojamientos" class="btn btn-warning btn-md-lg  px-4 fw-semibold">
                Explorar Alojamientos
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </section>

    <!-- Acerca de Nosotros -->
    <section class="py-5 bg-light" id="acerca">
        <div class="container-lg">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-3">Sobre Nuestra Empresa</h2>
                    <p>En <span class="text-primary">Mis Alojamientos</span> nos dedicamos a ofrecer opciones de hospedaje con la mejor relación calidad-precio. Nuestra misión es que cada viaje sea cómodo, seguro y memorable.</p>
                    <p>Contamos con una amplia selección de hoteles, cabañas y apartamentos, todos verificados y garantizados por nuestro equipo de expertos.</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1758422437/pexels-biong-abdalla-369197604-33967688_ixctqx.jpg"
                        alt="Acerca de Nosotros" class="img-fluid rounded shadow-sm">
                </div>
            </div>
        </div>
    </section>

    <!-- Por qué elegirnos -->
    <section class="py-5">
        <div class="container-lg text-center">
            <h2 class="fw-bold mb-5">Por qué elegirnos</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-shield-check fs-1 text-primary mb-3"></i>
                        <h5 class="fw-semibold">Seguridad Garantizada</h5>
                        <p>Todos nuestros alojamientos son verificados y cumplen con los estándares de seguridad.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-people fs-1 text-primary mb-3"></i>
                        <h5 class="fw-semibold">Atención Personalizada</h5>
                        <p>Nuestro equipo de soporte está disponible para ayudarte antes, durante y después de tu viaje.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-geo-alt fs-1 text-primary mb-3"></i>
                        <h5 class="fw-semibold">Ubicaciones Estratégicas</h5>
                        <p>Encuentra alojamientos en las mejores zonas para disfrutar de tu estadía.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="bi bi-currency-dollar fs-1 text-primary mb-3"></i>
                        <h5 class="fw-semibold">Precios Justos</h5>
                        <p>Ofrecemos opciones para todos los presupuestos sin comprometer la calidad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Explora y Reserva -->
    <section class="py-5 bg-primary text-light">
        <div class="container-lg text-center">
            <h2 class="fw-bold mb-3">Encuentra tu alojamiento ideal hoy</h2>
            <p class="fs-5 mb-4">Hoteles, cabañas y apartamentos cuidadosamente seleccionados para brindarte la mejor experiencia.</p>
            <a href="/crud-alojamientos/app/views/public/alojamientos.php"
                class="btn btn-warning btn-md-lg px-5 fw-semibold d-inline-flex align-items-center">
                Explorar Alojamientos
                <i class="bi bi-arrow-right ms-2 fs-5"></i>
            </a>
        </div>
    </section>

    <!-- Sección FAQ -->
    <section class="py-5 bg-light">
        <div class="container-lg">
            <h2 class="text-center fw-bold mb-5">Preguntas Frecuentes</h2>

            <div class="accordion" id="faqAccordion">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                            ¿Cómo reservo un alojamiento?
                        </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Selecciona tu alojamiento favorito desde el panel de usuario y posteriomente agreguelo a la lista.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                            ¿Puedo cancelar mi reserva?
                        </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Sí, puedes cancelar tu reserva dando en el boton eliminar.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                            ¿Cómo puedo contactar con soporte?
                        </button>
                    </h2>
                    <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Puedes enviarnos un correo a soporte@LuxeStay.com.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . "/../layouts/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>