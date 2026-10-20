using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Net.Http;
using System.Threading.Tasks;
using Newtonsoft.Json.Linq;

namespace WebApplication1.Models
{
    public class WebServices
    {
        string apikey = "b1207074bae24da833a523b842b61fb6";
        public async Task<Web> GetApi(string city)
        {
            string url = $"https://api.openweathermap.org/data/2.5/weather?q={city}&appid={apikey}&units=metric";

            var client = new HttpClient();

            HttpResponseMessage response = await client.GetAsync(url);

            string responseBody = await response.Content.ReadAsStringAsync();

            var weather = JObject.Parse(responseBody);

            return new Web
            {
                City = weather["name"].ToString(),
                Temperature = weather["main"]["temp"].ToString(),
                Description = weather["weather"][0]["description"].ToString()
            };



        }
    }
}