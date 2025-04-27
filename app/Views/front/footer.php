<footer class="bg-dark text-white mt-5 footer">
  
  <div class="container-fluid  py-4">
    <div class="row">
      
      <!-- Suscripción -->
      <div class="text-center col-md-6 offset-md-1 px-4 suscripcion">
        <h5 class="text-uppercase">Suscribite</h5>
        <p>Recibi las ofertas exclusivas para la web.</p>
        <form>
          <div class="mb-2">
            <input type="email" class="form-control" placeholder="Email" required>
          </div>
          <button type="submit" class="btn btn-outline-light w-100">Subscribirse</button>
        </form>
      </div>

      <!-- Redes Sociales -->
      <div class="col-md-4 text-md-end">
        <h5 class="text-uppercase text-white">Seguinos</h5>
        <a href="https://www.instagram.com/" target="_blank" class="text-white me-3 fs-4"><i class="bi bi-instagram"></i></a>
        <a href="https://www.facebook.com/?locale=es_LA" target="_blank" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
      </div>

    </div>

    <!-- Línea inferior -->
    <div class="text-center pt-4 mt-4 border-top border-secondary">
      <p class="mb-0 small">Copyright © Neighbourhood 2025 </p>
    </div>
  </div>

    <!-- botón para subir -->
    <a href="#" id="btn-top" class="btn btn-primary position-fixed bottom-0 end-0 m-4" style="display: none; z-index: 999;
          background-color: white;
          color: #143d33;
          border: 2px solid #143d33;">
        ↑
    </a>
    <script>
        const btnTop = document.getElementById('btn-top');

        window.addEventListener('scroll', () => {
          if (window.scrollY > 300) {
            btnTop.style.display = 'block';
          } else {
            btnTop.style.display = 'none';
          }
        });

        btnTop.addEventListener('click', function(e) {
          e.preventDefault();
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        });
    </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script> <!-- enlace boostrap-->
 </footer>
</body>  
</html>
