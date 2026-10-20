const queryStr = require("querystring")
// export var namee = "Alok"
// module.exports = {
//     namee: "Alok"
// }

function userSubmitedData(rq, rsp)
{
    let dataBody = []
    rq.on('data', (chunk) => {
        dataBody.push(chunk)
    })
    rq.on('end', () => {
        let rawData = Buffer.concat(dataBody).toString()
        let readable = queryStr.parse(rawData)
        
        console.log(`Hello ${readable.fullname} and your email is ${readable.email}`)
    })




    rsp.write("Form Submitted")
}
module.exports = userSubmitedData