<!doctype html>
<html lang="es">
<head>
    <title>Login con Avatar</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

<!--barra de navegacion-->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src= "{{ asset('imagenes/logousb.png') }}"  width="100" height="35" alt="Logo USB" class="me-2">
      <span class="fw-bold">Universidad Salesiana de Bolivia</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Localizaciones</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contactos</a></li>
      </ul>
    </div>
  </div>
</nav>




<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black shadow-lg">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <!-- Encabezado -->
                <div class="text-center">
                  <h4 class="mt-3 mb-2">Sistema de Pasantías</h4>
                  <p class="text-muted mb-4">Universidad Salesiana de Bolivia</p>
                </div>

                <!-- Avatar -->
                <div class="avatar-upload">
                    <label for="avatarInput">
                        <div id="avatarPreview" class="avatar-preview"></div>
                    </label>
                    <input type="file" id="avatarInput" accept="image/*">
                    <div class="text-center avatar-text mt-2">Haz clic para cambiar tu avatar</div>
                </div>
                <!-- Formulario -->
                <form>
                  <p>Login</p>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Correo institucional</label>
                    <input type="email" id="form2Example11" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Contraseña</label>
                    <input type="password" id="form2Example22" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="Usuario">Usuario universitario</label>
                  <input type="text" id="Usuario" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Iniciar sesión</button>
                    <a class="text-muted" href="#!">¿Olvidaste tu contraseña?</a>
                  </div>
                </form>

              </div>
            </div>

            <!-- Panel lateral -->
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Mision</h4>
                <p class="small mb-0">
                Formar profesionales competentes, buenos cristianos y honrados ciudadanos, contribuyendo al desarrollo social y cultural del país.  
                </p>
                <h4 class="mb-4">Vision</h4>
                <p class="small mb-0">
                Ser reconocida como una institución educativa de excelencia y formación humana, un centro de referencia académica, espiritual y cultural, especialmente para las personas y familias menos favorecidas económica y geográficamente. 
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<<!--Stilos-->>
    <style>
        .gradient-custom-2 {
            background: #F23711;
        }
        @media (min-width: 768px) {
            .gradient-form { height: 100vh !important; }
        }
        @media (min-width: 769px) {
            .gradient-custom-2 { border-top-right-radius: .3rem; border-bottom-right-radius: .3rem; }
        }

        /* --- Avatar --- */
        .avatar-upload {
            position: relative;
            width: 120px;
            height: 200px;
            margin: 0 auto 15px;
        }
        .avatar-upload input {
            display: none;
        }
        .avatar-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #d8363a;
            background-size: cover;
            background-position: center;
            background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png');
            transition: 0.3s;
        }
        .avatar-preview:hover {
            opacity: 0.8;
            cursor: pointer;
        }
        .avatar-text {
            color: #d8363a;
            font-size: 0.85rem;
            
        }

    </style>



<script>

  // Vista previa del avatar
  const avatarInput = document.getElementById('avatarInput');
  const avatarPreview = document.getElementById('avatarPreview');

  avatarInput.addEventListener('change', () => {
      const file = avatarInput.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = e => avatarPreview.style.backgroundImage = `url(${e.target.result})`;
          reader.readAsDataURL(file);
      }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
