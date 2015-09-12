    </div>
  </div><!-- #row -->
</div><!-- #container -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-6 copyright">
        <p>&copy; <?php echo date('Y');?> <?php bloginfo('name');?></p>
      </div>
      <div class="col-sm-6 do">
        <a href="https://www.digitalocean.com/?refcode=ea1daa0c84c6" rel="nofollow"><img src="<?php bloginfo( 'template_directory' ); ?>/img/do.png" alt="DigitalOcean"></a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">
  $(function(){
    $(".search-ico").click(function(){
        $(".search-bar").toggleClass('search-open');
        var s = $("#search").val();
        if(s.length>2){
            $("#search").val('');
            $("#searchform").submit();
        }else{
            return false;
        }
    });
  });
</script>
</body>
</html>
