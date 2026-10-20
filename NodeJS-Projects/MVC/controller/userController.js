import { userList } from "../model/userModel.js"

export function handleUser(req, resp) {

    let userData = userList()
    console.log(userData)
    resp.render("user")
}