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
using RestaurantReviews;

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
            RestaurantReviewServiceClient reviewService = new RestaurantReviewServiceClient();
            List<RestaurantInfo> restInfos = reviewService.GetAllRestaurants();
            return View(restInfos);
        }

        public IActionResult Edit(int? id)
        {
            if(id == null)
            {
                return RedirectToAction("Error");
            }
            RestaurantReviewServiceClient reviewService = new RestaurantReviewServiceClient();
            RestaurantInfo restInfo = reviewService.GetRestaurantById(id.Value);
            return View(restInfo);
        }

        [HttpPost]
        public IActionResult Edit(RestaurantInfo restInfo)
        {
            RestaurantReviewServiceClient reviewService = new RestaurantReviewServiceClient();
            try
            {
                reviewService.SaveRestaurant(restInfo);
            }
            catch(Exception e)
            {
                return RedirectToAction("Error on Edit");
            }
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
