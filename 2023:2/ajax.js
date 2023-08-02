
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btn').addEventListener('click', function() {

        if (document.getElementById('text').value !== "") {

            let result = document.getElementById('result');
            let xhr = new XMLHttpRequest();

            xhr.open('POST', 'index.php', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
            xhr.send('text=' + encodeURIComponent(document.getElementById('text').value));

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        result.textContent = xhr.responseText;
                    }
                };
            }
        }
    }, false);
}, false);