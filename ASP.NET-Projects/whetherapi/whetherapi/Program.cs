using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;
using System.Xml.Linq;

namespace whetherapi
{
    internal class Program
    {
       
        static async Task Main(string[] args)
        {
            //Console.Write("Enter City Name : ");
            //string city = Console.ReadLine();
            //Console.WriteLine();
            //string apikey = "2ad3629039fc4a2688cf7005bed943a2";
            string url = "https://newsapi.org/v2/everything?q=tesla&from=2025-08-27&sortBy=publishedAt&apiKey=2ad3629039fc4a2688cf7005bed943a2";

            var client = new HttpClient();

            HttpResponseMessage response = await client.GetAsync(url);

            string responseBody = await response.Content.ReadAsStringAsync();

            var newsData = JObject.Parse(responseBody);

            Console.WriteLine(newsData);
          

        }
    }
}
