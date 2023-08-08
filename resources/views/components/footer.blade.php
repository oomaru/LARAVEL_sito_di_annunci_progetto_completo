{{-- <footer class="bg-light text-center text-white margin-custom">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #3b5998;"
          href="#!"
          role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #55acee;"
          href="#!"
          role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #dd4b39;"
          href="#!"
          role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #ac2bac;"
          href="#!"
          role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #0082ca;"
          href="#!"
          role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
        <!-- Github -->
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #333333;"
          href="#!"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white" href="">fattoamano.com</a>
    </div>
    <!-- Copyright -->
  </footer> --}}

  <!-- Footer -->
<footer id="footer" class="text-center text-lg-start footer-custom">
  <!-- Section: Social media -->
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto my-auto">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-3">
            PRESTO.COM
          </h6>
          <p>
            {{__('ui.PresentazioneFooter')}}
          </p>
        </div>
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto my-auto">
          <p class="h5">
            {{__('ui.InvitoFooter')}}
          </p>
          <p class="lead">
            <a href="{{route('revisor.work')}}">{{__('ui.LavoraConNoi')}}</a>
          </p>
        </div>
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 pt-5">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">{{__('ui.Contatti')}}</h6>
          <p><i class="fas fa-home me-3"></i> Milano, Via Roma, 1 - 20100 - MI</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@presto.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 39 023 479 023</p>
          <p><i class="fas fa-print me-3"></i> + 39 023 479 024</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="{{route('welcome')}}">PRESTO.COM</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->