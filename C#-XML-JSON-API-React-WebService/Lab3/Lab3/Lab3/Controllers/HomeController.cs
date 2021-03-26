using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using System.Text;
using System.Xml;
using System.Xml.Serialization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System.Runtime.Serialization;
using System.Xml.Schema;
using System.IO;
using System.Xml.XPath;
using System.Xml.Linq;
using Lab3.Models;

namespace Lab3.Controllers
{
    public class HomeController : Controller
    {
        private readonly ILogger<HomeController> _logger;

        public HomeController(ILogger<HomeController> logger)
        {
            _logger = logger;
        }
        public IActionResult Index()
        {
            restaurant_review restaurantList = null;
            List<RestaurantOverviewViewModel> restaurantOverviewViewModels = new List<RestaurantOverviewViewModel>();

            string xmlFilePath = Path.GetFullPath("Data/restaurant_review .xml");

            XmlSerializer serializor = new XmlSerializer(typeof(restaurant_review));

            FileStream xs = new FileStream(xmlFilePath, FileMode.Open);

            restaurantList = (restaurant_review)serializor.Deserialize(xs);

            int count = 0;
            foreach (restaurant_reviewRestaurant restaurant in restaurantList.restaurant)
            {
                count++;
                restaurantOverviewViewModels.Add(new RestaurantOverviewViewModel()
                {

                    Id = count,
                    Name = restaurant.name,
                    FoodType = restaurant.type,
                    Rating = decimal.Parse(restaurant.reviews.review.rating.Value.ToString()),
                    Cost = restaurant.pricecredit.Value,
                    City = restaurant.address.city,
                    ProvinceState = restaurant.address.ProvinceState.ToString()
                });
            }
            xs.Close();
            return View(restaurantOverviewViewModels);

        }

        public IActionResult Edit(int? id)
        {
            restaurant_review restaurantList = null;

            string xmlFilePath = Path.GetFullPath("Data/restaurant_review .xml");

            FileStream xs = new FileStream(xmlFilePath, FileMode.Open);

            XmlSerializer serializor = new XmlSerializer(typeof(restaurant_review));

            restaurantList = (restaurant_review)serializor.Deserialize(xs);

            xs.Close();
            //id = 0;
            int i = (int)id - 1;

            RestaurantEditViewModel restaurantEditView = new RestaurantEditViewModel()
            {
                Id = i,
                Name = restaurantList.restaurant[i].name,
                StreetAddress = restaurantList.restaurant[i].address.StreetAddress,
                City = restaurantList.restaurant[i].address.city,
                ProvinceState = restaurantList.restaurant[i].address.ProvinceState,
                PostalZipCode = restaurantList.restaurant[i].address.PostalZipCode,
                Rating = decimal.Parse(restaurantList.restaurant[i].reviews.review.rating.Value),
                Summary = restaurantList.restaurant[i].reviews.review.summary


            };
            return View(restaurantEditView);

        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Edit(RestaurantEditViewModel rsVM)
        {
            restaurant_review restaurantList = null;
            string xmlFilePath = Path.GetFullPath("Data/restaurant_review .xml");

            XmlSerializer serializor = new XmlSerializer(typeof(restaurant_review));

            FileStream xs = new FileStream(xmlFilePath, FileMode.Open);

            restaurantList = (restaurant_review)serializor.Deserialize(xs);

            xs.Close();
            string xmlFile = Path.GetFullPath("Data/restaurant_review .xml");

            XmlWriterSettings settings = new XmlWriterSettings();
            settings.CheckCharacters = true;
            settings.Encoding = Encoding.Unicode;
            settings.Indent = true;
            settings.NewLineOnAttributes = true;


            XmlWriter xw = XmlWriter.Create(xmlFile, settings);

            XmlSerializer serializer = new XmlSerializer(typeof(restaurant_review));
            int i = (int)rsVM.Id - 1;
            restaurant_reviewRestaurant restaurant = restaurantList.restaurant[i];
            restaurant.name = rsVM.Name;
            restaurant.address.city = rsVM.City;
            restaurant.address.PostalZipCode = rsVM.PostalZipCode;
            restaurant.address.ProvinceState = rsVM.ProvinceState;
            restaurant.address.StreetAddress = rsVM.StreetAddress;
            restaurant.reviews.review.summary = rsVM.Summary;
            restaurant.reviews.review.rating.Value = rsVM.Rating.ToString(); 


            serializer.Serialize(xw, restaurantList);
            xw.Close();
            
            return RedirectToAction("Index");
        }
        public IActionResult Privacy()
        {
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
