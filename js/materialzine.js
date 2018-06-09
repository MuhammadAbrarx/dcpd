jQuery(document).ready(function($) {
            //read latter
            jQuery('body').on('click', '.ot-add-read-later', function(){
                var postID = parseInt(jQuery(this).data('post'));
                var postIDs = "";
                var __postIDs = "";

                if ( jQuery.cookie( "ot_read_later" ) ) {
                    postIDs+= jQuery.cookie( "ot_read_later" );
                }

                if( postIDs != "" ) {
                    if (postIDs.indexOf(postID) <= 0) {
                        __postIDs = postID+","+postIDs;
                        postIDs = __postIDs;
                    }
                    
                } else {
                    postIDs+= postID;
                }

                jQuery.cookie('ot_read_later', postIDs, { path: '/',expires: 604800 }); 
                //jQuery.cookie('ot_read_later', postIDs, { expires: 604800 }); 

                jQuery(this).hide();
                jQuery(this).next(".ot-remove-read-later").show();
      

                

                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_html',
                        'nonce' : ot.security,
                    },
                    success:function(data) {
                        //console.log(data);
                        if(data !== '-1') {
                            jQuery('#portus-read-later').html(data);
                        } else {
                            //jQuery('#portus-read-later').hide();
                        }
         
                    },
                });
                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_button',
                        'nonce' : ot.security,
                        'postID' : postID
                    },
                    success:function(data) {
                        if(data !== '-1') {
                            jQuery('.ot-read-later[data-post="'+ postID + '"]').not('.ot-read-later-2[data-post="'+ postID + '"]').replaceWith(data);
                        }

                    },
                });
                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_button',
                        'nonce' : ot.security,
                        'postID' : postID,
                        'style' : "rm-btn-small",
                    },
                    success:function(data) {
                        
                        if(data !== '-1') {
                            jQuery('.ot-read-later-2[data-post="'+ postID + '"]').replaceWith(data);
                        }

                    },
                });

                return false;
            });

           	jQuery('body').on('click', '.ot-remove-read-later', function(){
                var postID = parseInt(jQuery(this).data('post'));
                var postIDs = "";


                if ( jQuery.cookie( "ot_read_later" ) ) {
                    postIDs+= jQuery.cookie( "ot_read_later" );
                }
                
                if( postIDs != "" ) {
                    if (postIDs.indexOf(postID+",") >= 0) {
                        postIDs = postIDs.replace(postID+",",'');
                    } else if (postIDs.indexOf(postID) >= 0) {
                        postIDs = postIDs.replace(postID,'');
                    }
                    
                }

                jQuery.cookie('ot_read_later', postIDs, { path: '/', expires: 604800 } ); 
                //jQuery.cookie('ot_read_later', postIDs, { expires: 604800 } ); 

                jQuery(this).hide();
                jQuery(this).prev(".ot-add-read-later").show();
     

                
                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_html',
                        'nonce' : ot.security,
                    },
                    success:function(data) {

                        if(data !== '-1') {
                            jQuery('#portus-read-later').html(data);
                        } else {
                           // jQuery('#portus-read-later').hide();
                        }
         
                    },
                });
                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_button',
                        'nonce' : ot.security,
                        'postID' : postID
                    },
                    success:function(data) {

                        if(data !== '-1') {
                            jQuery('.ot-read-later[data-post="'+ postID + '"]').not('.ot-read-later-2[data-post="'+ postID + '"]').replaceWith(data);

                        }
                        
                    },
                });
                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_button',
                        'nonce' : ot.security,
                        'postID' : postID,
                        'style' : "rm-btn-small",
                    },
                    success:function(data) {

                        if(data !== '-1') {
                            jQuery('.ot-read-later-2[data-post="'+ postID + '"]').replaceWith(data);

                        }
                        
                    },
                });

                return false;
            });

            jQuery('body').on('click', '.ot-remove-read-later-post', function(){
                var postID = parseInt(jQuery(this).data('post'));
                var postIDs = "";


                if ( jQuery.cookie( "ot_read_later" ) ) {
                    postIDs+= jQuery.cookie( "ot_read_later" );
                }
                
                if( postIDs != "" ) {
                    if (postIDs.indexOf(postID+",") >= 0) {
                        postIDs = postIDs.replace(postID+",",'');
                    } else if (postIDs.indexOf(postID) >= 0) {
                        postIDs = postIDs.replace(postID,'');
                    }
                    
                }

                jQuery.cookie('ot_read_later', postIDs, { path: '/', expires: 604800 } ); 
                //jQuery.cookie('ot_read_later', postIDs, { expires: 604800 } ); 


                jQuery(this).parent().parent().hide();

                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_html',
                        'nonce' : ot.security,
                    },
                    success:function(data) {

                        if(data !== '-1') {
                            jQuery('#portus-read-later').html(data);
                        } else {
                            //jQuery('#portus-read-later').hide();
                        }
         
                    },
                });

                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_button',
                        'nonce' : ot.security,
                        'postID' : postID
                    },
                    success:function(data) {
                        
                        if(data !== '-1') {
                            jQuery('.ot-read-later[data-post="'+ postID + '"]').not('.ot-read-later-2[data-post="'+ postID + '"]').html(data);
                        }
                    },
                });
                jQuery.ajax({
                    url: ot.adminUrl,
                    data: {
                        'action':'read_later_button',
                        'nonce' : ot.security,
                        'postID' : postID,
                        'style' : "rm-btn-small",
                    },
                    success:function(data) {
                        
                        if(data !== '-1') {
                            jQuery('.ot-read-later-2[data-post="'+ postID + '"]').html(data);
                        }
                    },
                });

                return false;
            });
            jQuery('.main-slider-owl').not('.ot-style-2 .main-slider-owl').not('.ot-style-3 .main-slider-owl').owlCarousel({
                margin: 20,
                responsiveClass: true,
                items: 1,
                nav: false,
                dots: true,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });

            jQuery('.main-slider-owl').not('.ot-style-1 .main-slider-owl').not('.ot-style-3 .main-slider-owl').owlCarousel({
                margin: 20,
                responsiveClass: true,
                nav: true,
                dots: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    }
                }
            });

            jQuery('.main-slider-owl').not('.ot-style-1 .main-slider-owl').not('.ot-style-2 .main-slider-owl').owlCarousel({
                margin: 20,
                responsiveClass: true,
                items: 1,
                nav: true,
                dots: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true
            });

});