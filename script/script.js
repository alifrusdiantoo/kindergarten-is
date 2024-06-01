// START OF TOGGLE FOR TABS
const tabs = document.querySelectorAll("[data-tab-target]");
const activeClass = "bg-secondary";

// Select the first tab as default
tabs[0].classList.add(activeClass);
document.querySelector("#tab1").classList.remove("hidden");

// Add event when the tab button clicked
tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const targetContent = document.querySelector(tab.dataset.tabTarget);

    // add hidden to add tab-content
    document
      .querySelectorAll(".tab-content")
      .forEach((content) => content.classList.add("hidden"));
    // remove hidden class from tab-content
    targetContent.classList.remove("hidden");
    // remove activeClass from all button
    document
      .querySelectorAll(".bg-secondary")
      .forEach((activeTab) => activeTab.classList.remove(activeClass));
    // add activeClass to the click button
    tab.classList.add(activeClass);
  });
});
// END OF TOGGLE FOR TABS

