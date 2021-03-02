var navbar = document.getElementById('navbar')

window.onscroll = () => {
  if (window.scrollY <= 100) navbar.style.backgroundColor = 'rgba(0, 0, 0, 0)'

  if (window.scrollY > 100 && window.scrollY <= 600)
    navbar.style.backgroundColor = `rgba(255, 253, 251, ${
      (window.scrollY - 100) / 500
    })`
}