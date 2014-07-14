<div id="lr-dash-widget-goog" class="lr-widget k-widget">
  <div class="lr-widget-header">
    <table>
      <tr>
        <td class="lr-widget-header-title">Google Search</td>
        <td width="80px" nowrap="1" class="lr-widget-ctrl-box"><a href="#" class="k-icon k-i-pencil lr-widget-ctrl-edit">&nbsp;</a><a href="#" class="k-icon k-i-arrow-n lr-widget-ctrl-toggle">&nbsp;</a><a href="#" class="k-icon k-i-custom lr-widget-ctrl-config">&nbsp;</a><a href="#" class="k-icon k-i-close lr-widget-ctrl-close">&nbsp;</a></td>
      </tr>
    </table>
  </div>
  <div class="lr-widget-content">
    <div class="lr-widget-goog-wrapper">
      <div class="lr-widget-goog-inner">
        <div class="lr-widget-goog-input">
          <form data-action="https://www.google.com/search" class="lr-widget-goog-form"><span class="k-textbox k-space-right lr-widget-goog-ctrl">
              <input type="text" class="lr-widget-goog-input"/><a class="k-icon k-i-search lr-widget-goog-go">&nbsp;</a></span>
            <div class="lr-widget-goog-opts">
              <h3 class="lr-widget-goog-opts-header">Search Options</h3>
              <div class="lr-widget-goog-opt-contain">
                <div class="lr-widget-goog-opts-sites">
                  <h4 class="lr-widget-goog-opts-header">Sites</h4>
                  <div class="lr-widget-goog-opt-contain">
                    <div class="lr-widget-goog-opts-site">
                      <label>
                        <input type="checkbox" data-append=" AND site:wikipedia.org"/>wikipedia.org
                      </label>
                    </div>
                    <div class="lr-widget-goog-opts-site">
                      <label>
                        <input type="checkbox" data-append=" AND site:youtube.com"/>youtube.com
                      </label>
                    </div>
                    <div class="lr-widget-goog-opts-site">
                      <label>
                        <input type="checkbox" data-append=" AND site:yahoo.com"/>yahoo.com
                      </label>
                    </div>
                  </div>
                </div>
                <div class="lr-widget-goog-opts-misc">
                  <h4 class="lr-widget-goog-opts-header">Miscellaneous</h4>
                  <div class="lr-widget-goog-opt-contain">
                    <div class="lr-widget-goog-opts-site">
                      <label>
                        <input type="checkbox" data-append="&amp;btnI"/>Feeling Lucky
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
(function(){
  $('.lr-widget-goog-input').keydown(function(e){
    var form=$(this).closest('.lr-widget-goog-form');
    if(e.which===13){
      form.find('.lr-widget-goog-go').click();
    }
  });
  $('.lr-widget-goog-go').click(function(){
    var form=$(this).closest('.lr-widget-goog-form'),
        input=form.find('.lr-widget-goog-input');
    if(input.val()){
      var targ=$(this).closest('.lr-widget-goog-form').data('action');
      targ+="?q=" + input.val();
      form.find('.lr-widget-goog-opts-site :checked').each(function(i,el){
        targ+=$(el).data('append');
      });
      form.find('.lr-widget-goog-opts-misc :checked').each(function(i,el){
        targ+=$(el).data('append');
      });
      window.open(targ);
    }
  });
  $('.lr-widget-goog-opts-header').each(function(i,el){
    $(el).next().slideUp(0);
  });
  $('.lr-widget-goog-opts-header').click(function(){
    $(this).next().slideToggle(100);
  });
})();
</script>