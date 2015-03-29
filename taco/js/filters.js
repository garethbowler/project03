jQuery(function($){
    var $tacosContainer = $('.tacos-container');
    var $tacos = $('.taco-container');
    var $meatSelectors = $("input[type='checkbox']");
    var $tacoRanges = $("input[type='range']");

    function resetFilters(boxes){
        $tacoRanges.each(function(){var val
            val=($(this).attr('rev')?'0':5);
            $(this).attr('value',val)
        });
        boxes.each(function(){$(this).attr('checked',true);});
    }

    resetFilters($meatSelectors);

    function sortWithKey(boxes,keyAttr,cntr,rev){
        boxes.detach();
        rev=(rev=='true'?true:false);
        boxes.sort(function(a,b){
            var an,bn;
            an = a.getAttribute(keyAttr);
            bn = b.getAttribute(keyAttr);
            if(an < bn)return (rev?-1:1);
            if(an > bn)return (rev?1:-1);
            return 0;
        });
        cntr.empty();
        boxes.appendTo(cntr);
    }

    sortWithKey($tacos,'distance',$tacosContainer,'true');
    
    
    $meatSelectors.change(function() {
    	var valChecked = this.value;
        if(this.checked) {
            $(".taco-container").each(function(){
            	if(valChecked === $(this).attr('meat')){
            		$(this).show("slow");
            	}
            });
        }else {
        	$(".taco-container").each(function(){
            	if(valChecked === $(this).attr('meat')){
            		$(this).hide("slow");
            	}
            });
        }
    });

    $tacoRanges.change(function(){var i,data,val,steps,tacoData,rangeData,rev;
        if((data=$(this).attr('data'))){
            if((steps=$(this).attr('steps'))){
                steps=steps.split(',');
                for(i=0;i<steps.length;i++){
                    steps[i]=parseInt(steps[i]);
                }
            }
            rev=($(this).attr('rev')?'true':false);
            val = $(this).val();
            rangeData = (typeof steps!='undefined'?steps[val]:val);
            $(".taco-container").each(function(){
                tacoData = $(this).attr(data);
                if(!rev){
                    if(tacoData > rangeData)$(this).hide("slow");
                    else $(this).show("slow");
                }else {
                    if(tacoData < rangeData)$(this).hide("slow");
                    else $(this).show("slow");
                }
                
            });

        }
        
    });

    $(".sort-tacos").click(function(){
        resetFilters($meatSelectors);
        $tacos.each(function(){$(this).hide("slow");});
        sortWithKey($tacos,$(this).attr('data'),$tacosContainer,$(this).attr('rev'));
        $tacos.each(function(){$(this).show("slow");});
    });

});