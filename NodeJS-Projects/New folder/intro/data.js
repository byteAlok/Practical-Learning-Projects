
// export var namee = "Alok"
// module.exports = {
//     namee: "Alok"
// }

function userData(rq, rsp)
{
    rsp.write(`<form action="/submit" method="post">
                <input type="text" placeholder="Enter Full Name" name="fullname"/>
                <input type="text" placeholder="Enter Email" name="email"/>
                <button>Submit</button>
            </form>`)
}
module.exports = userData