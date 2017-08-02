class Search {
    static get(url) {
        let xhr = new XMLHttpRequest();
        xhr.open("GET", url);
        xhr.send();

        return new Promise((resolve, reject) => {
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) return resolve(JSON.parse(xhr.responseText));

                    reject(xhr.status);
                }
            }
        });

    }
}

function getOptions(buildSelector, url, valor, modo) {
    let citiesSelector = document.querySelector(buildSelector);
    citiesSelector.innerHTML = "";
    Search.get(url + valor)
        .then(resp => {

            resp.forEach(item => {
                
                let optionEl = document.createElement("option");
                switch (modo) {
                    case 1:
                        optionEl.value = item.id;
                        optionEl.textContent = item.name;
                        break;
                
                    default:
                        optionEl.value = item.id;
                        optionEl.textContent = item.description;
                        break;
                }
                
                citiesSelector.appendChild(optionEl);
            });
        });
}

