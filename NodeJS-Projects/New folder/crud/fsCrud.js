// const fs = require("fs")

// fs.writeFileSync("../text.txt", "Hello Fs module")
// fs.unlinkSync("../text.txt")

// var a = fs.writeFile("../text.txtt", "Hello Fs module", (err) => {
//     if (err)
//     {
//         console.log("Error")
//     }
//     else{
//         console.log("hdhdh")
//     }
// })
// console.log(a)
// fs.unlink("../text.txtt", ()=>{})

// fs.appendFileSync("../text.txt", ". This is append")
// 


const fs = require("fs")
const cmd = process.argv[2]

if (cmd == "write")
{
    const name = process.argv[3]
    const data = process.argv[4]
    let fileName = "../"+name+".txt"
    fs.writeFileSync(fileName, data)
    console.log("File Create Successfully!")
}
else if (cmd == "read")
{
    const name = process.argv[3]  
    let fileName = "../"+name+".txt"
    let data = fs.readFileSync(fileName) 
    console.log(data)
}
else if (cmd == "update")
{
    const name = process.argv[3]  
    const data = process.argv[4]  
    let fileName = "../"+name+".txt"
    fs.appendFileSync(fileName, data)
    console.log("File Updated Successfully!")
}
else if (cmd == "delete")
{
    const name = process.argv[3]  
    let fileName = "../"+name+".txt"
    fs.unlinkSync(fileName) 
    console.log("File Deleted Successfully!")
}
