
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			 $('.fancybox').fancybox({
                padding : 10,
                openEffect  : 'elastic',
                helpers:  {
            title : {
                type : 'inside'
            },
            overlay : {
                css : {
                    'background' : 'rgba(255,255,255,0.5)'
                }
            },
            margin : [20, 60, 20, 60]
        }

            });



			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',
					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

		


		});