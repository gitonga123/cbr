var rehabstudio = rehabstudio || {};
rehabstudio.main = function() {

	// banner settings
	var width = 728;
	var height = 90;
	var loop = 2;
	// the color palette taken from PSDs
	var colors = {
		yellow : "#ffc335",
		blue : "#4385f4",
		blue_active : "#5893F5"
	};

	// image resources
	var images = [
		"site_bg.gif",
		"video_poster.jpg",
		"side_bar.gif",
		"site_logo.gif",
		"logo_google_adsense.png"
	];

	// animation presets
	var ease = {
		pushdown : Bounce.easeOut,
		swipe : Power4.easeInOut,
		zoom : Power4.easeIn
	}

	// global timing, in seconds
	var time = {
		endswipe : 1.1
	}

	var site = {
		bgColor : "#fef8f2",
		headerColor : "#fff"
	}

	// debug & dev properties
	var debug_site = false; // halt and show the dummy site, for layout
	var debug_site_animate = true; // should the dummy site play its animation

	// create main container
	var banner = rehabstudio.createElement({id:"banner", boxSizing:"border-box", border:"1px solid #444", width: width, height: height, backgroundColor: "white", overflow: "hidden", parent: document.body});


	// set up DoubleClick listeners
	rehabstudio.dc.init({
		onInit: function() {

			// add click listener
			banner.set({cursor: "pointer"});
			banner.onclick = function() {
				Enabler.exit("exit");
			};
		},
		onPolite: function() {
			//Dynamic content
			/*
			 * Dynamic Content Enable code for Profile: 1054531
			 *
			 * The following code initializes the following dynamic variables for
			 * development testing and live serving of Fields associated to the above profile
			*/

			// Dynamic Content variables and sample values
			var dynCta = "Learn more";
		    var dynCopy1 = "Put Ads on your blog with Adsense";
		    var dynCopy2 = "Get paid for doing what you love";
			/*
			 * You may access the variables in the following manner
			 * AFTER the Studio Enabler is initialized.
			 * var dynCta = dynamicContent.google_20150806_adsense_Business[0].dynCta;
			 * Note: be sure to use "dynamicContent", not "devDynamicContent"
			*/

			// on polie load, load images
			rehabstudio.preloadImages(images, function(){
				// when images are done loading


				// ----------------------------------------
				// The Banner, all the elements.

				// create the dummy site container, this can change size to accomodate the site content and fill the banner.
				var site_container = rehabstudio.createElement({id: "site_container", backgroundColor: site.bgColor, scale:1.0, transformOrigin:"center center", overflow: "hidden", width: 1500, height: 800, left: 0, top: 0, retina: false, parent: banner});

					var site_header = rehabstudio.createElement({id: "site_header", backgroundColor: site.headerColor, width: 1500, height: 95,  left: 0, top: 0, retina: false, parent: site_container});


					// -------------------
					// the site content, this will be centered within its container, the container is animated inside banner, not the content placeholder
					var site_content = rehabstudio.createElement({id: "site_content", backgroundColor: site.bgColor, backgroundImage:"site_bg.gif", width: 1000, height: 800, left: 0, top: 0, retina: false, parent: site_container});

						// make site content fit container horizontally
						site_content.centerHorizontal();


						var site_logo = rehabstudio.createElement({id: "site_logo", backgroundImage: "site_logo.gif", left: 98, top: 24, retina: false, parent: site_content});

						var video_poster = rehabstudio.createElement({id: "video_poster", backgroundImage: "video_poster.jpg", left: 104, top: 200, retina: false, parent: site_content});
						var side_bar = rehabstudio.createElement({id: "side_bar", backgroundImage: "side_bar.gif", left: 672, top: 340, retina: false, parent: site_content});

						// the leaderboard ad above video
						var site_pushdown_1 = rehabstudio.createElement({id: "site_pushdown_1", backgroundColor: colors.yellow, width: 550, height: 68, left: 104, top: 204, retina: false, parent: site_content});

						// the mpu ad in side bar
						var site_pushdown_2 = rehabstudio.createElement({id: "site_pushdown_2", backgroundColor: colors.yellow, width: 230, height: 190, left: 674, top: 340, retina: false, parent: site_content});

						if (debug_site) {
							TweenLite.set(banner, {overflow:"visible"});
							TweenLite.set(site_container, {overflow:"visible", scale:1.0});
							if(debug_site_animate) doPushdownAnimation();
							return;
						};

						// zoom out on site, prepare it for animation zoom
					 	TweenLite.set(site_container, {opacity:1.0, scale:0.16, x:-640, y:-337});


				// copy panel
				var copy_panel = rehabstudio.createElement({id: "copy_panel", backgroundColor: "#fff", width: width, height: 90, left: 220, bottom: 0, retina: false, parent: banner});
					var txt_1 = rehabstudio.createElement({id: "txt_1", type:"p", className:"txt roboto regular", boxSizing: "border-box", padding: "0 30px", textAlign: "center", width: 367, left: 0, top: 34, parent: copy_panel});
					txt_1.innerHTML = dynCopy1;


				var endframe_panel = rehabstudio.createElement({id: "endframe_panel", opacity: 0, backgroundColor: colors.yellow, width: width, height: height, left: 0, top: 0, overflow: "hidden", boxSizing: "border-box", retina: false, parent: banner});
					var txt_3 = rehabstudio.createElement({id: "txt_3", type: "p" , className:"roboto regular txt_endframe", boxSizing: "border-box", padding: "0 25px", textAlign: "center", width: 584, left: 0, top: 33, retina: false, parent: endframe_panel});
					txt_3.innerHTML = dynCopy2;

				// cta panel
				var cta_panel = rehabstudio.createElement({id: "cta_panel", right: 0, backgroundColor: "#fff", bottom: 0, width: 142, height: 90, parent: banner});
					var logo_google_adsense = rehabstudio.createElement({id: "logo_google_adsense", type:"image", backgroundImage: "logo_google_adsense.png", right: 8, top: 19, retina: true, parent: cta_panel});

					var w = 126; // cta button width, the label will fit button width, and center text
					var cta_button = rehabstudio.createElement({id: "cta_button", backgroundColor: colors.blue, width: w, height: 35, right: 8, bottom: 8, borderRadius:2, retina: false, parent: cta_panel});
					var cta_button_label = rehabstudio.createElement({id: "cta_button_label", type:"p", className:"opensans semibold", width: w, height: 20, left: 0, top: 8, retina: false, parent: cta_button});
					cta_button_label.innerHTML = dynCta;




				// ---------------
				//  listeners, they are so few no need to encapsulate in a seperate function
				cta_button.addEventListener("mouseover", function(){
					TweenLite.to(cta_button, 0.3, {backgroundColor:colors.blue_active})
				})
				cta_button.addEventListener("mouseout", function(){
					TweenLite.to(cta_button, 0.3, {backgroundColor:colors.blue})
				})


				// ------------------------
				// animation parts/elements

				doPushdownAnimation();

				doSiteAnimation();

				doCopyAnimation();

				doEndframeAnimation();
				
				// the main timeline
				var animation = new TimelineLite()
					.add("loop")
					.add(txt_1.in, "+=0.5")
					.add(site_container.pushdown, "+=0.1")
					.add(site_container.zoom_in, "+=0.2")
					.add(endframe_panel.in, "-=0.3")
					.add(site_container.reset)
					.add(txt_3.in, "-=1.0")
					.call(function() {
						if (loop === 0) animation.stop();
						loop--;
					})
					.add(txt_1.out)
					.add(endframe_panel.out, "+=0.5")
					.add(site_container.slide_in, "-="+time.endswipe)
				.call(function () { animation.seek("loop"); console.log("loop")});
				animation.seek("start");

				if (rehabstudio.scrubber) rehabstudio.scrubber({mainTimeline: animation});



			}); // end of preloading images


			// ---------------------------------------
			// animation methods

			// pushdown animation, on the dummy site
			function doPushdownAnimation (argument) {
				// the dummy site animation timeline
				site_container.pushdown = new TimelineLite()
					.to(video_poster, 0.5, {y:68+20, ease:ease.pushdown}, "-=0.0")
					.from(site_pushdown_1, 0.5, {height:0, ease:ease.pushdown}, "-=0.3")
					.to(side_bar, 0.5, {y:190+20, ease:ease.pushdown}, "-=0.5")
					.from(site_pushdown_2, 0.5, {height:0, ease:ease.pushdown}, "-=0.3");
			}

			function doSiteAnimation (argument) {
				// zoom in
				site_container.zoom_in = new TimelineLite()
					.to(site_container, 1.2, {scale: 2.4, y: 35, ease: ease.zoom});

				//site_container.zoom_out = new TimelineLite()
				//.to(site_container, 2.0, {scale:1.0, x:0, y:0});

				site_container.reset = new TimelineLite()
					.to(site_container, 0.1, {scale: 0.16, x: -640, y: -337, immediateRender: false})
					.to(video_poster, 0.1, {y: 0})
					.to(site_pushdown_1, 0.1, {height: 0})
					.to(side_bar, 0.1, {y: 0})
					.to(site_pushdown_2, 0.1, {height: 0});

				site_container.slide_in = new TimelineLite()
					.from(site_container, time.endswipe, {left:width, ease: ease.swipe, immediateRender: false})
			}

			function doCopyAnimation (argument) {

				// Put ads on your site with adsense
				txt_1.in = new TimelineLite().from(txt_1, 0.5, {opacity:0.0});
				txt_1.out = new TimelineLite().to(txt_1, 0.5, {opacity:0.0});

				// and earn more for your business
				txt_3.in = new TimelineLite().from(txt_3, 0.5, {opacity:0.0});
				txt_3.out = new TimelineLite().to(txt_3, 0.5, {opacity:0.0});
			}

			function doEndframeAnimation (argument) {

				// in, the endframe drops down and fills the banner
				endframe_panel.in = 
					new TimelineLite()
					.to(endframe_panel, 0.01, {opacity: 1})
					.from(endframe_panel, 1, {x:0, width:220})
					.from(endframe_panel, 0.15, {y: 12, height: 50}, "-=1");
				// out, slides out to the left
				endframe_panel.out = new TimelineLite()
					.to(endframe_panel, time.endswipe, {x:-width, ease:ease.swipe});
			}



		},
		onVisible: function() {

		}
	});
}