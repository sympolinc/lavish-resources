<?php
class Dashboard{
    private $current_0=array();
    private $current_1=array();
    private $current_2=array();
    function __construct(){
        
    }
    public function add($name,$col=0){
        switch($col):
            case 1:
                $this->current_1[count($this->current_1)]=$name;
                break;
            case 2:
                $this->current_2[count($this->current_2)]=$name;
                break;
            default:
                $this->current_0[count($this->current_0)]=$name;
                break;
        endswitch;
    }
    public function build(){
        echo '<div class="lr-dash-wrap">';
            echo '<div class="lr-dash-column">';
                foreach($this->current_0 as $item):
                    $file=LR_ABS . "dashlets/$item/$item.php";
                    if(file_exists($file)):
                        echo '<div class="lr-widget-wrap" data-name="' . $item . '">';
                        include_once $file;
                        echo '</div>';
                    endif;
                endforeach;
                echo '</div>';
                echo '<div class="lr-dash-column">';
                foreach($this->current_1 as $item):
                    $file=LR_ABS . "dashlets/$item/$item.php";
                    if(file_exists($file)):
                        echo '<div class="lr-widget-wrap" data-name="' . $item . '">';
                        include_once $file;
                        echo '</div>';
                    endif;
                endforeach;
                echo '</div>';
                echo '<div class="lr-dash-column">';
                foreach($this->current_2 as $item):
                    $file=LR_ABS . "dashlets/$item/$item.php";
                    if(file_exists($file)):
                        echo '<div class="lr-widget-wrap" data-name="' . $item . '">';
                        include_once $file;
                        echo '</div>';
                    endif;
                endforeach;
            echo '</div>';
        echo '</div>';
        echo '<script type="text/javascript">
        $(".lr-widget-ctrl-toggle").click(function(e){
            e.preventDefault();
            $(this).toggleClass("k-i-arrow-n k-i-arrow-s").closest(".lr-widget").find(".lr-widget-content").slideToggle(100);  
        });
        $(".lr-widget-ctrl-close").click(function(e){
            e.preventDefault();
            $(this).closest(".lr-widget-wrap").fadeOut(function(){
                $(this).remove()
            });  
        });
        $(".lr-dash-column").kendoSortable({
            filter:".lr-widget-wrap",
            connectWith:".lr-dash-column",
            placeholder: function(element) {
            return element.clone().css({
                "opacity": 0.3,
                "border": "1px dashed #000000",
            });
            },
            cursor: "move",
            ignore:":input"
        });
        </script>';
    }
}