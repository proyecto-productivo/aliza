// url http://ayudameaencontrar.dev/getcities/5
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