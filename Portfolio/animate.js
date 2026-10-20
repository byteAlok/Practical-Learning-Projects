document.addEventListener("DOMContentLoaded", () => {

  var el = ""
  
  gsap.from("#introProfile", {
    opacity: 0,
    x: 50,
    y: 20,
    rotate: -24,
    scale: 0.75,
    duration: 0.75
  });

  gsap.from("#introText *", {
    opacity: 0,
    y: -20,
    duration: 0.75
  })

  gsap.from("#stats", {
    opacity: 0,
    y: 20,
    scale: 0.98,
    duration: 0.75
  })

  gsap.from("#aboutText", {
    opacity: 0,
    x: -50,
    duration: 1,
    scrollTrigger: {
      trigger: "#aboutText",
      start: "top 80%",
    }
  })

  gsap.from("#aboutProfile", {
    opacity: 0,
    x: 50,
    y: 20,
    rotate: 24,
    scale: 0.75,
    duration: 0.75,
    scrollTrigger: {
      trigger: "#aboutProfile",
      start: "top 80%",
    }

  })

  gsap.utils.toArray(".qualifications > div, .qualifications section").forEach((el, i) => {
    gsap.from(el, {
      opacity: 0,
      y: 50,
      duration: 0.75,
      stagger: 0.2,
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
      }
    })
  })

  gsap.from("#projects", {
    opacity: 0,
    y: 50,
    duration: 0.75,
    scrollTrigger: {
      trigger: "#pText",
      start: "top 80%",

    }
  })

  gsap.utils.toArray("#contact > div > div, #contact > div > .text-center").forEach((el, i) => {
    gsap.from(el, {
      opacity: 0,
      y: 50,
      duration: 0.75,
      stagger: 0.2,
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
      }
    });
  });

  gsap.utils.toArray("#contact-form > div > div").forEach((el, i) => {
    gsap.from(el, {
      opacity: 0,
      y: 50,
      duration: 0.75,
      stagger: 0.2,
      scrollTrigger: {
        trigger: el,
        start: "top 80%",
      }
    });
  });

  gsap.from("#contact-form", {
    opacity: 0,
    y: 30,
    duration: 0.75,
    // stagger: 0.15,
    scrollTrigger: {
      trigger: el,
      start: "top 80%",

    }
  })


})