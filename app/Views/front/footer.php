<footer class="footer">
    
    <div class="footer-content container">
      <div class="link">
        <h3>Nuestras redes</h3>
        <ul>
          <li><a href="https://www.instagram.com/" target="_blank"> <img src="assets/img/ig.png"> </a></li>
          <li><a href="https://twitter.com/?lang=es" target="_blank"> <img src="assets/img/x.png"></a></li>
          <li><a href="https://www.facebook.com/?locale=es_LA" target="_blank"> <img src="assets/img/facebook.png"> </a></li>
        </ul>
      </div>   
    </div>  
 
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

  <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </footer>
</body>  
</html>
