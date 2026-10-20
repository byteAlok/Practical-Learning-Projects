using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Threading.Tasks;
using System.Web;

namespace WebApplication2.Models
{
    public class webServe
    {
        string apikey = "b1207074bae24da833a523b842b61fb6";
        public async Task<webModel> GetApi(string City)
        {
            string url = $"https://api.openweathermap.org/data/2.5/weather?q={City}&appid={apikey}&units=metric";

            var client = new HttpClient();

            HttpResponseMessage respone = await client.GetAsync(url);

            string responseBody = await respone.Content.ReadAsStringAsync();

            var weather = JObject.Parse(responseBody);

            return new webModel
            {
                City = weather["name"].ToString(),
                Temp = weather["main"]["temp"].ToString(),
                Desc = weather["weather"][0]["description"].ToString()
            };


        }
        
    }
}