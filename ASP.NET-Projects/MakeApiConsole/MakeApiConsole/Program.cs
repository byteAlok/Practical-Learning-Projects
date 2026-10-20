
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace MakeApiConsole
{
    internal class Program
    {
        static async Task Main(string[] args)
        {

            Console.Write("Enter Name : ");
            string name = Console.ReadLine();
            string url = $"https://localhost:44370/api/Hello/{name}";

            var client = new HttpClient();

            HttpResponseMessage response = await client.GetAsync(url);

            string responseBody = await response.Content.ReadAsStringAsync();

            var api = JObject.Parse(responseBody);

            
            Console.WriteLine(api);
            //Console.WriteLine(api["Subjects"][3]);


        }
    }
}
