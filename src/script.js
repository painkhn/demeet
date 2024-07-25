// Кнопка, при нажатии на которую будут отправлены данные
const button = document.querySelector('.download__main-card--btn');

button.addEventListener('click', () => {
    fetch('src/config.php')
      .then(response => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
      })
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  });
