using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using Microsoft.AspNetCore.Http;
using System.ComponentModel.DataAnnotations.Schema;
using Microsoft.AspNetCore.Http.Extensions;
using System.Xml;
using System.Xml.Schema;
using System.Xml.Serialization;
using System.IO;

namespace Lab3.Models
{
    public class RestaurantOverviewViewModel
    {
        public int Id { get; set; }
        [Display(Name = "Rataurant")]
        public string Name { get; set; }
        [Display(Name = "Food Type")]
        public string FoodType { get; set; }
        [Display(Name = "Rating (best=5)")]
        public decimal Rating { get; set; }
        [Display(Name = "Cost (most expensive=5)")]
        public decimal Cost { get; set; }
        [Display(Name = "City")]
        public string City { get; set; }
        [Display(Name = "Province")]
        public string ProvinceState { get; set; }
    }
}
