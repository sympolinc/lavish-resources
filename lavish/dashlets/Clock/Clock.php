
<?php?>
<div id="lr-dash-widget-clock" class="lr-widget k-widget">
  <div class="lr-widget-header">
    <table>
      <tr>
        <td class="lr-widget-header-title">Clock</td>
        <td width="80px" nowrap="1" class="lr-widget-ctrl-box"><a href="#" class="k-icon k-i-pencil lr-widget-ctrl-edit">&nbsp;</a><a href="#" class="k-icon k-i-arrow-n lr-widget-ctrl-toggle">&nbsp;</a><a href="#" class="k-icon k-i-custom lr-widget-ctrl-config">&nbsp;</a><a href="#" class="k-icon k-i-close lr-widget-ctrl-close">&nbsp;</a></td>
      </tr>
    </table>
  </div>
  <div class="lr-widget-content">
    <div class="lr-widget-clock-wrapper">
      <div class="lr-widget-clock-inner">
        <table>
          <tr>
            <td class="lr-widget-clock-hour">00</td>
            <td class="lr-widget-clock-colon">:</td>
            <td class="lr-widget-clock-minute">00</td>
            <td class="lr-widget-clock-colon">:</td>
            <td class="lr-widget-clock-sec"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="lr-widget-footer">
    <?php //render_widget_info('copy'); ?>
  </div>
</div>
<script type="text/javascript">
(function(){
    if(!jQuery){
        console.error("jQuery is required to run the Clock widget");    // Notify the console of a problem
        var a=document.getElementbyId('lr-dash-widget-clock').parentNode; //  ensures wrapper is removed as well.
        a.parentNode.removeChild(a);    // remove the widget.
        return;
    }
  function a(i) {
    if (i<10) {i = "0" + i;}
    return i;
  }
  function ss() {
    var t=new Date();
    var h=t.getHours();
    var m=t.getMinutes();
    var s=t.getSeconds();
    h = a(h);
    m = a(m);
    s = a(s);
    $('.lr-widget-clock-hour').html(h);
    $('.lr-widget-clock-minute').html(m);
    $('.lr-widget-clock-sec').html(s);
    var z = setTimeout(function(){ss()},500);
  }
  ss();
})(jQuery);
</script>