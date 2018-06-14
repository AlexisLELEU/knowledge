class searchAutoComplete {
  constructor() {
    this.bindThis();
    this.getDom();
    this.eventListener();
    this.state = {
      END_POINT: "http://localhost:8888/api.php",
      CLIENT: "/client",
      GET: {
        method: "GET"
      },
      DELETE: {
        method: "DELETE"
      },
      renderingHTMLAutoComplete: (id_client, lastname, firstname) => {
        this.dom.resultSearch.innerHTML += `<div class='search-result__client' name='${id_client}'>
            <a href="../client_details.php?id=${id_client}">${lastname} ${firstname}</a>
          </div>`;
      }
    };
  }
  /**
   * @return method bind with this context
   */
  bindThis() {
    [
      "handleChange",
      "renderResultApi",
      "filterResultApi",
      "toggleModalTicket",
      "closeModalTicket",
      "closeModalCreateTicket",
      "toggleModalCreateTicket"
    ].forEach(fn => {
      this[fn] = this[fn].bind(this);
    });
  }
  toggleModalTicket() {
    this.dom.modalTicket.classList.toggle("modal-ticket--active");
    if (this.dom.modalTicket.classList.contains("modal-ticket--active")) {
      document.querySelector("body").style.overflow = "hidden";
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    } else {
      document.querySelector("body").style.overflow = "visible";
    }
  }
  toggleModalCreateTicket() {
    this.dom.modalCreateTicket.classList.toggle("modal-create-ticket--active");
    if (
      this.dom.modalCreateTicket.classList.contains(
        "modal-create-ticket--active"
      )
    ) {
      document.querySelector("body").style.overflow = "hidden";
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    } else {
      document.querySelector("body").style.overflow = "visible";
    }
  }
  closeModalCreateTicket() {
    console.log("okok");
    this.dom.modalCreateTicket.classList.remove("modal-create-ticket--active");
    document.querySelector("body").style.overflow = "visible";
  }
  closeModalTicket() {
    this.dom.modalTicket.classList.remove("modal-ticket--active");
    document.querySelector("body").style.overflow = "visible";
  }
  filterResultApi(resultApi, string) {
    return resultApi.filter(post => {
      const lowerCase = post.lastname.toLowerCase();
      if (!lowerCase.includes(string)) {
        return false;
      }
      return true;
    });
  }
  renderResultApi(resultApi) {
    const { renderingHTMLAutoComplete } = this.state;
    resultApi.map(item => {
      if (item) {
        renderingHTMLAutoComplete(
          item.id_client,
          item.firstname,
          item.lastname
        );
      }
    });
    return resultApi;
  }
  handleChange(pEvt) {
    const { END_POINT, CLIENT, GET } = this.state;
    let value = pEvt.target.value;
    fetch(`${END_POINT}${CLIENT}`, GET)
      .then(res => {
        return res.json();
      })
      .then(data => {
        this.dom.resultSearch.innerHTML = "";
        if (pEvt.target.value !== "") {
          let result;
          let string = "";
          value = value.toLowerCase();
          for (let i = 0; i < value.length; i++) {
            string = string + value[i];
          }
          result = this.filterResultApi(data, string);
          return this.renderResultApi(result);
        }
      });
  }
  eventListener() {
    if (this.dom.search) {
      this.dom.search.addEventListener("input", this.handleChange);
    }
    if (this.dom.modalTicket || this.dom.modalCreateTicket) {
      for (let i = 0; i < this.dom.btnModal.length; i++) {
        this.dom.btnModal[i].addEventListener("click", this.toggleModalTicket);
      }
      this.dom.closeModalTicket.addEventListener(
        "click",
        this.closeModalTicket
      );

      this.dom.btnCreateTicket.addEventListener(
        "click",
        this.toggleModalCreateTicket
      );
      this.dom.closeModalCreateTicket.addEventListener(
        "click",
        this.closeModalCreateTicket
      );
    }
  }
  getDom() {
    this.dom = {};
    this.dom.form = document.querySelector(".form");
    this.dom.username = document.querySelector(".username");
    this.dom.description = document.querySelector(".description");
    this.dom.age = document.querySelector(".age");
    this.dom.search = document.querySelector(".search");
    this.dom.resultSearch = document.querySelector(".result-search");
    this.dom.modalTicket = document.querySelector(".js-element-modal-ticket");
    this.dom.modalCreateTicket = document.querySelector(
      ".js-element-modal-createTicket"
    );
    this.dom.btnModal = document.querySelectorAll(".js-element-btnModal");
    this.dom.closeModalCreateTicket = document.querySelector(
      ".js-element-close-createTicket"
    );
    this.dom.closeModalTicket = document.querySelector(
      ".js-element-close-ticket"
    );
    this.dom.btnCreateTicket = document.querySelector(
      ".js-element-btnCreateTicket"
    );
  }
}

new searchAutoComplete();
