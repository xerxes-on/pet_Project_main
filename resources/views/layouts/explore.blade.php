<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Anton&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

*,
*::after,
*::before {
  box-sizing: border-box;
}

:root {
  font-size: 12px;
  --color-text: #292828;
  --color-bg: #ddd;
  --color-link: #000;
  --color-link-hover: #000;
  --page-padding: 1rem;
  --angle: -15deg;
  --trans-content: -30vh;
}

body {
  margin: 0;
  color: var(--color-text);
  background-color: var(--color-bg);
  font-family: "Poppins", sans-serif;
  text-transform: uppercase;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.noscroll {
  height: 100dvh;
  width: 100%;
  overflow: hidden;
  position: fixed;
  top: 0;
}

a {
  text-decoration: none;
  color: var(--color-link);
  outline: none;
  cursor: pointer;
}

a:hover {
  text-decoration: underline;
  color: var(--color-link-hover);
  outline: none;
}

a:focus {
  outline: none;
  background: lightgrey;
}

a:focus:not(:focus-visible) {
  background: transparent;
}

a:focus-visible {
  outline: 2px solid red;
  background: transparent;
}

.hidden {
  opacity: 0;
  pointer-events: none;
}

.intro {
  width: 100%;
  height: 100vh;
  overflow: hidden;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #000;
}

.intro::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url(https://github.com/misalagp/imgs/blob/main/noise.png?raw=true),
    radial-gradient(circle, #315f316e 0%, transparent 100%);
  background-size: 250px, 100%;
  pointer-events: none;
}

.intro--open {
  height: 80vh;
}

.grid {
  gap: 1rem;
  flex: none;
  position: relative;
  width: 200vw;
  height: 200vh;
  display: grid;
  grid-template-rows: repeat(5, 1fr);
  grid-template-columns: 100%;
  transform: rotate(var(--angle));
  transform-origin: center center;
}

.row {
  display: grid;
  gap: 1rem;
  grid-template-columns: repeat(7, 1fr);
  will-change: transform, filter;
}

.row__item {
  position: relative;
}

.row__item-inner {
  position: relative;
  width: 100%;
  height: 100%;
  overflow: hidden;
  border-radius: 10px;
}

.row__item-img {
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: 50% 50%;
  position: absolute;
  top: 0;
  left: 0;
}

.row__item-img--large {
  width: 100vw;
  height: 100vh;
  top: 50%;
  left: 50%;
  margin: -50vh 0 0 -50vw;
  background-position: 50% 70%;
  will-change: transform, filter;
}

.enter {
  color: rgba(0, 0, 0, 0.8);
  position: absolute;
  text-transform: uppercase;
  padding: 1.75rem 4rem;
  font-weight: 600;
  z-index: 100;
  font-family: "Poppins", sans-serif;
  font-size: 1.5rem;
  background: url(https://github.com/misalagp/imgs/blob/main/noise.png?raw=true),
    radial-gradient(circle, transparent 0%, transparent 100%);
  background-size: 250px, 100%;
  transition: all 0.3s;
  cursor: pointer;
}

.enter::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  border: 1px solid rgba(0, 0, 0, 0.8);
  border-radius: 3rem;
  transition: all 0.3s;
  z-index: -1;
}

.enter:focus::before,
.enter:hover::before {
  background-color: rgba(0, 0, 0, 0.2);
}

.fullview {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.fullview .row__item-inner {
  border-radius: 0px;
}

.content {
  padding: var(--page-padding);
  position: relative;
}

.content::before {
  content: "";
  position: absolute;
  border-radius: 10px 10px 0 0;
  height: calc(100% + (-1) * var(--trans-content));
  width: 100%;
  top: 0;
  left: 0;
  z-index: 0;
  background: url(https://github.com/misalagp/imgs/blob/main/noise.png?raw=true),
    radial-gradient(at top, #688d68 0%, #ddd 100%);
  background-size: 250px, 100%;
}

.content > * {
  position: relative;
}

.content__nav {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  justify-content: space-between;
}

.content__header h2 {
  font-size: 2rem;
  font-family: "Anton", sans-serif;
  font-style: normal;
  font-weight: 400;
  margin: 6rem 0 10vh;
  line-height: 0.9;
}

.content__text {
  text-wrap: balance;
  display: flex;
  flex-direction: column;
  gap: 10vh;
  padding: 0 5vw;
}

.content__text p {
  max-width: 700px;
  font-size: 1.5rem;
  line-height: 1.4;
  margin: 0;
  margin-left: auto;
}

.content__text p.highlight {
  max-width: 1000px;
  font-size: 2rem;
  font-family: "Poppins", sans-serif;
  font-weight: 300;
}

.content__footer {
  display: flex;
  justify-content: space-between;
  margin-top: 20vh;
  transform: translateY(calc(-1 * var(--trans-content)));
}

@media screen and (min-width: 53em) {
  body {
    --page-padding: 2rem 3rem;
  }
  .content__header h2 {
    font-size: clamp(2rem, 20vh, 16rem);
  }
  .content__text p.highlight {
    font-size: clamp(2rem, 7vh, 4rem);
  }
}

    </style>
</head>
<body class="noscroll">
    <main>
      <section class="intro">
        <div class="grid">
          <div class="row">
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(./image.png)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(./image2.png)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/71FUHVZlKqL._SY522_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/91he4AAhBOL._SY522_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/41Zp5LPjKWL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/71i5kUJaGdL._SY522_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/81AmZLF3RhL._SL1500_.jpg)"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/41dlXkDZjXL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/51FZdoqnMIL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/41nnCj+SQFL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/4161DemEq4L._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/41t5rhlULTL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/51snNzJUe5L._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/41vyICnmUHL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/71FUHVZlKqL._SY522_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/81AmZLF3RhL._SL1500_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/71i5kUJaGdL._SY522_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/91he4AAhBOL._SY522_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(./image.png)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(./image2.png)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/518gCQ1Be2L._SY445_SX342_.jpg)"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/41xGx2B0l6L._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://m.media-amazon.com/images/I/51hYuUV2XFL._SY445_SX342_.jpg)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdna.artstation.com/p/assets/images/images/064/258/984/large/artem-demura-6.jpg?1687475251)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/061/128/743/large/artem-demura-my-love.jpg?1680082487)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/042/725/745/large/artem-demura-summer3.jpg?1635279208)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdna.artstation.com/p/assets/images/images/050/512/198/large/artem-demura-cherti-1.jpg?1655042172)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdna.artstation.com/p/assets/images/images/029/703/122/large/artem-demura-iron-moon1.jpg?1598382461)"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/020/115/867/large/artem-demura-tuman-ebat.jpg?1566422473)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/051/264/275/large/tim-warnock-nf-set5environments-war-torndemacia-c-04.jpg?1656872066)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/051/452/675/large/tim-warnock-nf-set5environments-poppy-nest-e-02.jpg?1657317296)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/076/637/933/large/joseph-feely-mongolian-wanderer.jpg?1717442287)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdnb.artstation.com/p/assets/images/images/056/142/719/4k/joseph-feely-z-king-olaf-returns.jpg?1668548685)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdna.artstation.com/p/assets/images/images/041/854/052/4k/joseph-feely-eagles-guardians-resized.jpg?1632883415)"></div>
              </div>
            </div>
            <div class="row__item">
              <div class="row__item-inner">
                <div class="row__item-img" style="background-image:url(https://cdna.artstation.com/p/assets/images/images/000/768/254/large/eytan-zana-the-arrival.jpg?1443928283)"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="fullview"></div>
        <a href="/books" class="enter"><span style="color: white">Explore</span></a>
      </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/Flip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
  <script>
    gsap.registerPlugin(Flip);

const body = document.body;
const content = document.querySelector(".content");
const enterButton = document.querySelector(".enter");
const fullview = document.querySelector(".fullview");
const grid = document.querySelector(".grid");
const gridRows = grid.querySelectorAll(".row");

// Cache window size and update on resize
let winsize = { width: window.innerWidth, height: window.innerHeight };
window.addEventListener("resize", () => {
  winsize = { width: window.innerWidth, height: window.innerHeight };
});

let mousepos = { x: winsize.width / 2, y: winsize.height / 2 };

// Configuration for enabling/disabling animations
const config = {
  translateX: true,
  skewX: false,
  contrast: true,
  scale: false,
  brightness: true
};

// Total number of rows
const numRows = gridRows.length;
// Calculate the middle row assuming an odd number of rows
const middleRowIndex = Math.floor(numRows / 2);

const middleRow = gridRows[middleRowIndex];
const middleRowItems = middleRow.querySelectorAll(".row__item");
const numRowItems = middleRowItems.length;
const middleRowItemIndex = Math.floor(numRowItems / 2); // Index of the middle item in the middle row
// Select the .row__item-inner element inside the middle .row__item element of the middle row
// This element will be used for the animation that transitions the image to fullscreen when the button is clicked
const middleRowItemInner = middleRowItems[middleRowItemIndex].querySelector(
  ".row__item-inner"
);
// And the inner image
const middleRowItemInnerImage = middleRowItemInner.querySelector(
  ".row__item-img"
);
// Setting the final size of the middle image for the reveal effect
middleRowItemInnerImage.classList.add("row__item-img--large");

// amt represents the interpolation amount for each row's movement.
// A higher amt value means faster interpolation and less lag behind the mouse movement.
const baseAmt = 0.1; // The amt for the middle row, which will have the fastest response.
const minAmt = 0.05; // Minimum amt value to ensure rows have a noticeable movement lag.
const maxAmt = 0.1; // Maximum amt value to ensure rows have a noticeable movement lag.

// Initialize rendered styles for each row with dynamically calculated amt values
let renderedStyles = Array.from({ length: numRows }, (v, index) => {
  const distanceFromMiddle = Math.abs(index - middleRowIndex);
  // Calculate amt dynamically based on the distance from the middle row
  const amt = Math.max(baseAmt - distanceFromMiddle * 0.03, minAmt);
  // Inverted amt for scale: outermost rows are faster
  const scaleAmt = Math.min(baseAmt + distanceFromMiddle * 0.03, maxAmt);
  let style = { amt, scaleAmt };

  if (config.translateX) {
    style.translateX = { previous: 0, current: 0 };
  }
  if (config.skewX) {
    style.skewX = { previous: 0, current: 0 };
  }
  if (config.contrast) {
    style.contrast = { previous: 100, current: 100 };
  }
  if (config.scale) {
    style.scale = { previous: 1, current: 1 };
  }
  if (config.brightness) {
    style.brightness = { previous: 100, current: 100 };
  }

  return style;
});

// Tracks if the render loop is running
let requestId;

// Function to get the mouse position
const getMousePos = (ev) => {
  let posx = 0;
  let posy = 0;
  if (!ev) ev = window.event;
  if (ev.pageX || ev.pageY) {
    posx = ev.pageX;
    posy = ev.pageY;
  } else if (ev.clientX || ev.clientY) {
    posx =
      ev.clientX +
      document.body.scrollLeft +
      document.documentElement.scrollLeft;
    posy =
      ev.clientY + document.body.scrollTop + document.documentElement.scrollTop;
  }
  return { x: posx, y: posy };
};

// Update mouse position
const updateMousePosition = (ev) => {
  const pos = getMousePos(ev);
  mousepos.x = pos.x;
  mousepos.y = pos.y;
};

// Linear interpolation function
const lerp = (a, b, n) => (1 - n) * a + n * b;

// Map mouse position to translation range
const calculateMappedX = () => {
  return (((mousepos.x / winsize.width) * 2 - 1) * 40 * winsize.width) / 100;
};

// Map mouse position to skew range (-3 to 3)
const calculateMappedSkew = () => {
  return ((mousepos.x / winsize.width) * 2 - 1) * 3;
};

// Map mouse position to contrast range (100 at center to 125 at edges)
const calculateMappedContrast = () => {
  const centerContrast = 100;
  const edgeContrast = 330;
  const t = Math.abs((mousepos.x / winsize.width) * 2 - 1);
  const factor = Math.pow(t, 2); // Quadratic factor for non-linear mapping
  return centerContrast - factor * (centerContrast - edgeContrast);
};

// Map mouse position to scale range (1 at center to 0.95 at edges)
const calculateMappedScale = () => {
  const centerScale = 1;
  const edgeScale = 0.95;
  return (
    centerScale -
    Math.abs((mousepos.x / winsize.width) * 2 - 1) * (centerScale - edgeScale)
  );
};

// Map mouse position to brightness range (100 at center to 15 at edges)
const calculateMappedBrightness = () => {
  const centerBrightness = 100;
  const edgeBrightness = 15;
  const t = Math.abs((mousepos.x / winsize.width) * 2 - 1);
  const factor = Math.pow(t, 2); // Quadratic factor for non-linear mapping
  return centerBrightness - factor * (centerBrightness - edgeBrightness);
};

// Function to get the value of a CSS variable
const getCSSVariableValue = (element, variableName) => {
  return getComputedStyle(element).getPropertyValue(variableName).trim();
};

// Render the current frame
const render = () => {
  const mappedValues = {
    translateX: calculateMappedX(),
    skewX: calculateMappedSkew(),
    contrast: calculateMappedContrast(),
    scale: calculateMappedScale(),
    brightness: calculateMappedBrightness()
  };

  // Calculate and set the translation for each row
  gridRows.forEach((row, index) => {
    const style = renderedStyles[index];

    // Update current positions and interpolate values
    for (let prop in config) {
      if (config[prop]) {
        style[prop].current = mappedValues[prop];
        const amt = prop === "scale" ? style.scaleAmt : style.amt;
        style[prop].previous = lerp(
          style[prop].previous,
          style[prop].current,
          amt
        );
      }
    }

    // Apply the interpolated values
    let gsapSettings = {};
    if (config.translateX) gsapSettings.x = style.translateX.previous;
    if (config.skewX) gsapSettings.skewX = style.skewX.previous;
    if (config.scale) gsapSettings.scale = style.scale.previous;
    if (config.contrast)
      gsapSettings.filter = `contrast(${style.contrast.previous}%)`;
    if (config.brightness)
      gsapSettings.filter = `${
        gsapSettings.filter ? gsapSettings.filter + " " : ""
      }brightness(${style.brightness.previous}%)`;

    gsap.set(row, gsapSettings);
  });

  // Continue the render loop
  requestId = requestAnimationFrame(render);
};

// Start the render loop
const startRendering = () => {
  if (!requestId) {
    render();
  }
};

// Stop the render loop
const stopRendering = () => {
  if (requestId) {
    cancelAnimationFrame(requestId);
    requestId = undefined;
  }
};

const enterFullview = () => {
  // Logic to animate the middle image to full view using gsap Flip
  const flipstate = Flip.getState(middleRowItemInner);
  fullview.appendChild(middleRowItemInner);

  // Get the CSS variable value for the translation
  const transContent = getCSSVariableValue(content, "--trans-content");

  // Create a GSAP timeline for the Flip animation
  const tl = gsap.timeline();

  // Add the Flip animation to the timeline
  tl.add(
    Flip.from(flipstate, {
      duration: 0.9,
      ease: "power4",
      absolute: true,
      onComplete: stopRendering
    })
  )
    // Fade out grid
    .to(
      grid,
      {
        duration: 0.9,
        ease: "power4",
        opacity: 0.01
      },
      0
    )
    // Scale up the inner image
    .to(
      middleRowItemInnerImage,
      {
        scale: 1.2,
        duration: 3,
        ease: "sine"
      },
      "<-=0.45"
    )
    // Move the content up
    .to(content, {
      y: transContent, // Use the CSS variable value
      duration: 0.9,
      ease: "power4"
    });

  // Hide the button
  enterButton.classList.add("hidden");
  // Scrolling allowed
  body.classList.remove("noscroll");
};

// Initialization function
const init = () => {
  startRendering();

  // Initialize click event for the "Explore" button
  enterButton.addEventListener("click", enterFullview);
  // Add touchstart event for mobile devices
  enterButton.addEventListener("touchstart", enterFullview);
};

// Mouse movement event listener to update mouse position
window.addEventListener("mousemove", updateMousePosition);
// Touch move event listener for touch devices
window.addEventListener("touchmove", (ev) => {
  const touch = ev.touches[0];
  updateMousePosition(touch);
});

const initSmoothScrolling = () => {
  // Initialize Lenis for smooth scroll effects. Lerp value controls the smoothness.
  const lenis = new Lenis({ lerp: 0.15 });

  // Ensure GSAP animations are in sync with Lenis' scroll frame updates.
  gsap.ticker.add((time) => {
    lenis.raf(time * 1000); // Convert GSAP's time to milliseconds for Lenis.
  });

  // Turn off GSAP's default lag smoothing to avoid conflicts with Lenis.
  gsap.ticker.lagSmoothing(0);
};

// Activate the smooth scrolling feature.
initSmoothScrolling();

// Call the initialization function
init();

  </script>
  </body>
</html>
