{{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script> --}}

<script src="https://loopple.s3.eu-west-3.amazonaws.com/soft-ui-design-system/js/core/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://demos.creative-tim.com/soft-ui-design-system/assets/js/soft-design-system.min.js?v=1.0.5" type="text/javascript"></script>
	<script src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/js/plugins/countup.min.js" type="text/javascript"></script>
	<script src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/js/plugins/flatpickr.min.js"></script>
	<script>
			if (document.getElementById("state1")) {
									const countUp = new CountUp("state1", document.getElementById("state1").getAttribute("countTo"));
									if (!countUp.error) {
										countUp.start();
									} else {
										console.error(countUp.error);
									}
								}
								if (document.getElementById("state2")) {
									const countUp1 = new CountUp("state2", document.getElementById("state2").getAttribute("countTo"));
									if (!countUp1.error) {
										countUp1.start();
									} else {
										console.error(countUp1.error);
									}
								}
								if (document.getElementById("state3")) {
									const countUp2 = new CountUp("state3", document.getElementById("state3").getAttribute("countTo"));
									if (!countUp2.error) {
										countUp2.start();
									} else {
										console.error(countUp2.error);
									};
								}
			
			 if (document.querySelector('.datepicker-1')) {
						flatpickr('.datepicker-1', {
						}); // flatpickr
					} 
			
			 if (document.querySelector('.datepicker-2')) {
						flatpickr('.datepicker-2', {
						}); // flatpickr
					}
	</script>