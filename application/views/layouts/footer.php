<footer style="background-color:#6eced5;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul>
          <li><a href="#"> Mentions légales</a></li>
          <li>-</li>
          <li><a href="#">Contact</a></li>
          <li>-</li>
          <li><a href="#">Publicité</a></li>
        </ul>
        <ul>
          <li><a href="#">Conditions générales d'utilisation</a></li>
          <li>-</li>
          <li><a href="#">Politique de confidentialité et relative aux cookies</a></li>
        </ul>
        <p>Copyright &copy; <?= date('Y')?>, Design by <a href="http://www.jetechnologie.com/" target="bank">jetechnologie</a></p>
        
      </div>
    </div>
  </div>
</footer>
<script src="<?= base_url().'assets/js/jquery.js';?>"></script>
<script src="<?= base_url().'assets/js/bootstrap.min.js';?>"></script>
<script type="text/javascript" src="<?= base_url().'assets/js/summernote.min.js';?>"></script>
<script type="text/javascript">
  $(function(){
    $(".summertext").summernote();
  });
</script>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<script>
  $(document).ready(function(){
    $("#hider").click(function(){
      $("#min_bloc_search").hide(1000);
    });
    $("#showr").click(function(){
      $("#min_bloc_search").show(1000);
    });
  });
</script> 

    <!-- <script>
      $(document).ready(function(){
        $(document).on('click', '#update', function(){
          var email = $(this).data('email');
          var id_patient = $(this).data('id_patient');
          $('#email').text(email);
          $('#id_patient').text(id_patient);
        })
      })
    </script> -->
<script>
  function getData($id_patient,$email)
  {
    $('#email').val($email);
    $('#id_patient').val($id_patient);
        
  }
</script>
<script>
  function getDataOperation($id_operation,$id_patient,$email)
  {
    $('#id_operation').val($id_operation);
    $('#id_patient').val($id_patient);
    $('#email').val($email);
  }
</script>
<script>
  function getid($id)
  {
    $('#id').val($id);
  }
</script>
<script>
  function getDataPersonnel($id_personnel) 
  {
    $('#id_personnel').val($id_personnel);
  }
  function getDataPharmacien($id_pharmacien)
  {
    $('#id_pharmacien').val($id_pharmacien);
  }
  function getIdPharmacie($id_pharmacie) 
  {
    $('#id_pharmacie').val($id_pharmacie);
  }
  function getIdHopital($id_hopital) 
  {
    $('#id_hopital').val($id_hopital);
  }
</script>