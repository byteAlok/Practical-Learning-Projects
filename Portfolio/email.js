(function () {
    emailjs.init("6HzzkqDwohZ8Oo0nd"); 
})()

const myForm = document.getElementById("contactForm")
let msg = document.getElementById("status")

myForm.addEventListener('submit', function(e)
{
    e.preventDefault()

    emailjs.sendForm("service_r96yc9q", "template_qxgfhdr", this)
    
    .then(function(){
        msg.className = "text-gray-800 mx-4 bg-blue-200 rounded py-2 px-4"
        msg.innerText = "Email Sent Successfully!"

        myForm.reset()

        setTimeout(() => {
            msg.innerText = ""
            msg.className = ""
        }, 5000)
    }) 

    .catch(function(error) {

        msg.className = "text-white mx-4 bg-red-400 rounded py-2 px-6"
        msg.innerText = "Failed to send message!"

        setTimeout(() => {
            msg.innerText = ""
            msg.className = ""
        }, 5000)
    })
})

let loopText = document.getElementById("loop")
let textArray = ["Full Stack Developer", "Backend Developer", "Software Developer", "Freelancer"]
let textIndex = 0
let charIndex = 0

function typeText()
{
    if (charIndex < textArray[textIndex].length)
    {
        loopText.innerHTML = loopText.innerHTML + textArray[textIndex].charAt(charIndex)
        charIndex++

        setTimeout(typeText, 100)
    }
    else
    {
        setTimeout(delText, 1000)
    }
}

function delText()
{
    if (charIndex > 0)
    {
        loopText.innerHTML = textArray[textIndex].substring(0, charIndex - 1)
        charIndex-- 

        setTimeout(delText, 50)
    }
    else
    {
        textIndex = (textIndex + 1) % textArray.length
        setTimeout(typeText, 200)
    } 
}

typeText()
