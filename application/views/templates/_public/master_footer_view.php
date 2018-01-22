<div class="attend">
      <h3 class="tittle atd">Are You Attending? RSVP here!</h3>
    <div class="rsvp">
       <form id="form" action="<?php echo site_url('home/doAttend');?>" method="post" >
         <div>
           <span><label>Bạn là</label></span>
           <span><input name="attendee" type="text" class="textbox"></span>
         </div>
         <div>
           <span><label>Bạn chú rể, họ hàng, nguời yêu cũ cô dâu, etc ...</label></span>
           <span><input name="relation" type="text" class="textbox"></span>
         </div>
         <div>
           <span><label>Bạn sẽ tham dự đuợc</label></span>
           <span><select name="event">
             <option value="0">Đám cuới</option>
             <option value="1">Ăn hỏi</option>
             <option value="2">Cả hai</option>
           </select></span>
         </div>
       <div>
           <span><label>Guest</label></span>
           <span><input name="guest" type="text" class="textbox"></span>
         </div>
         <div>
             <span><label>Note</label></span>
             <span><input name="note" placeholder="Tell us anything u want" type="text" class="textbox"></span>
           </div>
        <div class="sub">
           <input type="submit" value="I am attending" />
       </div>

       </form>
      </div>
   </div>
<!--/footer-->


<div class="copy">
    <p>&copy; Đám cuới Phạm Quang - Phạm Quỳnh </p>
</div>
<!--//footer-->
  <!--start-smooth-scrolling-->
        <script type="text/javascript">
              $(document).ready(function() {
                /*
                var defaults = {
                    containerID: 'toTop', // fading element id
                  containerHoverID: 'toTopHover', // fading element hover id
                  scrollSpeed: 1200,
                  easingType: 'linear'
                };
                */

                $().UItoTop({ easingType: 'easeOutQuart' });

              });
            </script>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<?php if (isset($page_js) && $page_js != '') : ?>
<script src="<?php echo base_url();?>assets/js/pages/<?php echo $page_js;?>.js"></script>
<?php endif; ?>

</body>
</html>
