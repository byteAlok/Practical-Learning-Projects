using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace jokeApi
{
    internal class Program
    {
        static async Task Main(string[] args)
        {
            string url = "https://official-joke-api.appspot.com/random_joke";
            var client = new HttpClient();  

            HttpResponseMessage response = await client.GetAsync(url);

            string responseBody = await response.Content.ReadAsStringAsync();

            var joke = JObject.Parse(responseBody);



            Console.WriteLine(responseBody);
            //Console.WriteLine(joke["type"]);
            Console.WriteLine(joke["setup"]);
            Console.WriteLine(joke["punchline"]);
            //Console.WriteLine(joke["id"]);


        }
    }
}
