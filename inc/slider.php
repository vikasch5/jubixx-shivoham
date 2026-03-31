<?php
$result = $conn->query("SELECT * FROM banners WHERE status = 1 ORDER BY id DESC");
$bannerCount = $result->num_rows;
?>
<section id="home" class="divider">
  <div class="container-fluid p-0">

    <!-- START REVOLUTION SLIDER 5.0.7 -->
    <div id="rev_slider_home_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery34"
      style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
      <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
      <div id="rev_slider_home" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
        <ul>
          <?php while ($row = $result->fetch_assoc()): ?>
            <!-- SLIDE 1 -->
            <li data-index="rs-1" data-transition="slidingoverlayhorizontal" data-slotamount="default"
              data-easein="default" data-easeout="default" data-masterspeed="default"
              data-thumb="uploads/banners/<?php echo $row['image']; ?>" data-rotate="0" data-fstransition="fade"
              data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Make an Impact">
              <!-- MAIN IMAGE -->
              <img src="uploads/banners/<?php echo $row['image']; ?>" alt="" data-bgposition="center center"
                data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
              <!-- LAYERS -->
              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" id="slide-1-layer-1"
                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full"
                data-height="full" data-whitespace="normal" data-transform_idle="o:1;"
                data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1000"
                data-basealign="slide" data-responsive_offset="on"
                style="z-index: 5;background-color:rgba(0, 0,0, 0.3);border-color:rgba(0, 0, 0, 1.00);">
              </div>
              =
            </li>
          <?php endwhile; ?>
        </ul>
        <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(166, 216, 236, 1.00);"></div>
      </div>
    </div>

    <!-- END REVOLUTION SLIDER -->
    <script type="text/javascript">
      var tpj = jQuery;
      var revapi34;

      tpj(document).ready(function () {

        var bannerCount = <?php echo $bannerCount; ?>;

        if (tpj("#rev_slider_home").revolution == undefined) {
          revslider_showDoubleJqueryError("#rev_slider_home");
        } else {

          revapi34 = tpj("#rev_slider_home").show().revolution({

            sliderType: "standard",
            jsFileLocation: "js/revolution-slider/js/",
            sliderLayout: "fullwidth",
            dottedOverlay: "none",

            // ✅ KEY FIX
            delay: bannerCount > 1 ? 9000 : 999999999,

            navigation: {
              keyboardNavigation: bannerCount > 1 ? "on" : "off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation: "off",
              onHoverStop: "on",

              touch: {
                touchenabled: bannerCount > 1 ? "on" : "off",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              },

              arrows: {
                style: "zeus",
                enable: bannerCount > 1,
                hide_onmobile: true,
                hide_under: 600,
                hide_onleave: true,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                tmp: '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div></div>',
                left: {
                  h_align: "left",
                  v_align: "center",
                  h_offset: 30,
                  v_offset: 0
                },
                right: {
                  h_align: "right",
                  v_align: "center",
                  h_offset: 30,
                  v_offset: 0
                }
              },

              bullets: {
                enable: bannerCount > 1,
                hide_onmobile: true,
                hide_under: 600,
                style: "metis",
                hide_onleave: true,
                hide_delay: 200,
                hide_delay_mobile: 1200,
                direction: "horizontal",
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 30,
                space: 5,
                tmp: '<span class="tp-bullet-img-wrap"><span class="tp-bullet-image"></span></span>'
              }
            },

            viewPort: {
              enable: true,
              outof: "pause",
              visible_area: "80%"
            },

            responsiveLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [600, 550, 500, 450],

            lazyType: "none",

            parallax: {
              type: "scroll",
              origo: "enterpoint",
              speed: 400,
              levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
            },

            shadow: 0,
            spinner: "off",

            // ❌ DO NOT USE stopLoop (causes blank issue)
            // stopLoop:"off",

            shuffle: "off",
            autoHeight: "off",

            debugMode: false,

            fallbacks: {
              simplifyAll: "off",
              nextSlideOnWindowFocus: "off",
              disableFocusListener: false,
            }

          });

        }

      });
    </script>
    <!-- END REVOLUTION SLIDER -->
    <div class="wave-shape">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
        <path class="elementor-shape-fill"
          d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7 c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4 c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z">
        </path>
      </svg>
    </div>
  </div>
</section>