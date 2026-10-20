using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp2NewApi
{
    internal class Program
    {
        static async Task Main(string[] args)
        {
            string apikey = "2ad3629039fc4a2688cf7005bed943a2";
            string url = "https://newsapi.org/v2/everything?q=tesla&from=2025-08-29&sortBy=publishedAt";
            

            var client = new HttpClient();

            client.DefaultRequestHeaders.Clear();
            client.DefaultRequestHeaders.Add("X-Api-Key", apikey);

            var version = System.Reflection.Assembly.GetExecutingAssembly().GetName().Version.ToString();
            client.DefaultRequestHeaders.Add("User-Agent", $"MyNewsApp/{version}");


            HttpResponseMessage response = await client.GetAsync(url);
            
            string responseBody = await response.Content.ReadAsStringAsync();

           JObject articles= JObject.Parse(responseBody);
            foreach (var article in articles)
            {
                Console.WriteLine(article);
            }

           
            

        }
    }
}
