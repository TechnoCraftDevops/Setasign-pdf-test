function creage() {
    fetch('http://127.0.0.1:8000', {
        method: 'GET',
        responseType: 'blob'
    })
        .then(response => response.blob())
        .then(data => {
            // Create a URL object
            const fileURL = URL.createObjectURL(data);

            // Create a temporary anchor element
            const downloadLink = document.createElement('a');
            downloadLink.href = fileURL;
            downloadLink.download = 'file.pdf'; // Set the desired filename

            // Trigger a click event on the anchor element
            downloadLink.click();

            // Remove the temporary anchor element
            downloadLink.remove();

            // Remove the URL object
            URL.revokeObjectURL(fileURL);
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

window.creage = creage;