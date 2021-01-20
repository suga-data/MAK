 <script defer>
    // these are the elements (class or ID) that will be changed
    const itemprogramme = document.querySelector("#itemprogramme");
    const itemartists = document.querySelector("#itemartists");
    const itemabout = document.querySelector("#itemabout");

    // this is being watched by the observer
    const sectionOne = document.querySelector("#programme");
    const sectionTwo = document.querySelector("#artists");
    const sectionThree = document.querySelector("#about");

    const sectionOptions = {};

    const sectionObserver = new IntersectionObserver(function (
      entries,
      sectionObserver
    ) {
      for (let i = 0; i < entries.length; i++) {
        let entry = entries[i];
        if (entry.isIntersecting) {
          if (entry.target.id === "programme") {
            itemprogramme.classList.add("nav-scrolled");
            itemartists.classList.remove("nav-scrolled");
            itemabout.classList.remove("nav-scrolled");
            return;
          }
          if (entry.target.id === "artists") {
            itemprogramme.classList.remove("nav-scrolled");
            itemartists.classList.add("nav-scrolled");
            itemabout.classList.remove("nav-scrolled");
            return;
          }
          if (entry.target.id === "about") {
            itemprogramme.classList.remove("nav-scrolled");
            itemartists.classList.remove("nav-scrolled");
            itemabout.classList.add("nav-scrolled");
            return;
          }
        }
      }
      // Impressum, als default wird hier alles weggenommen
      itemprogramme.classList.remove("nav-scrolled");
      itemartists.classList.remove("nav-scrolled");
      itemabout.classList.remove("nav-scrolled");
    },
    sectionOptions);

    sectionObserver.observe(sectionOne);
    sectionObserver.observe(sectionTwo);
    sectionObserver.observe(sectionThree);
  </script>