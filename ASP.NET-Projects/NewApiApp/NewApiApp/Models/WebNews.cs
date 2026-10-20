using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Threading.Tasks;
using System.Web;
using System.Xml.Linq;


namespace NewApiApp.Models
{
    public class WebNews
    {

        public async Task<IEnumerable<Web>> GetApi(string city)
        {
            string apikey = "2ad3629039fc4a2688cf7005bed943a2";
            string url = $"https://newsapi.org/v2/everything?q={city}&from=2025-09-01&sortBy=publishedAt";

            var client = new HttpClient();

            client.DefaultRequestHeaders.Clear();

            client.DefaultRequestHeaders.Add("X-Api-Key", apikey);


            client.DefaultRequestHeaders.Add("User-Agent", "NewsApiApp");

            HttpResponseMessage response = await client.GetAsync(url);
            string responseBody = await response.Content.ReadAsStringAsync();

            var newsData = JObject.Parse(responseBody);

            List<Web> newsList = new List<Web>();


            foreach (var news in newsData["articles"])
            {
                Web n = new Web
                {
                    Name = news["source"]["name"].ToString(),
                    Author = news["author"].ToString(),
                    Title = news["title"].ToString(),
                    Description = news["description"].ToString(),
                    Url = news["url"].ToString(),
                    ImgUrl = news["urlToImage"].ToString(),
                    PublishedTime = news["publishedAt"].ToString(),
                    Content = news["content"].ToString(),
                };
                newsList.Add(n);
            }

            return newsList;
        }
    }

}