using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;
using System.Web;
using System.Xml.Serialization;
using System.Xml;

namespace Lab6
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Service1" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Service1.svc or Service1.svc.cs at the Solution Explorer and start debugging.
    public class RestaurantReviewService : IRestaurantReviewService
    {
        public List<string> GetRestaurantNames()
        {
            List<string> names = new List<string>();
            restaurant_review allRestaurants = GetRestaurantsFromXml();

            if (allRestaurants != null)
            {
                foreach (restaurant_reviewRestaurant rest in allRestaurants.restaurant)
                {
                    names.Add(rest.name);
                }
            }
            return names;
        }
        public List<RestaurantInfo> GetAllRestaurants()
        {
            List<RestaurantInfo> restaurantList = new List<RestaurantInfo>();
            restaurant_review allRestaurants = GetRestaurantsFromXml();
            int count = 0;
            if (allRestaurants != null)
            {
                foreach (restaurant_reviewRestaurant rest in allRestaurants.restaurant)
                {
                    
                    restaurantList.Add(new RestaurantInfo()
                    {
                        Name = rest.name,
                        Id = count,
                        Rating = (int)double.Parse(rest.reviews.review.rating.Value),
                        FoodType = rest.type,
                        Cost = rest.pricecredit.Value,
                        Summary = rest.reviews.review.summary,
                        Location = new Address
                        {
                            Street = rest.address.StreetAddress,
                            City = rest.address.city,
                            PostalCode = rest.address.PostalZipCode,
                            Province = rest.address.ProvinceState.ToString()
                        }
                    });
                    count++;
                }
                return restaurantList;
            }
            return null;
        }
        public RestaurantInfo GetRestaurantById(int id)
        {
            List<RestaurantInfo> restaurantList = new List<RestaurantInfo>();
            restaurant_review allRestaurants = GetRestaurantsFromXml();
            int count = 0;
            if (allRestaurants != null)
            {
                foreach (restaurant_reviewRestaurant rest in allRestaurants.restaurant)
                {
                    //count++;
                    restaurantList.Add(new RestaurantInfo()
                    {
                        Name = rest.name,
                        Id = count,
                        Rating = (int)double.Parse(rest.reviews.review.rating.Value),
                        FoodType = rest.type,
                        Cost = rest.pricecredit.Value,
                        Summary = rest.reviews.review.summary,
                        Location = new Address
                        {
                            Street = rest.address.StreetAddress,
                            City = rest.address.city,
                            PostalCode = rest.address.PostalZipCode,
                            Province = rest.address.ProvinceState.ToString()
                        }
                    });
                    count++;
                }

                foreach (RestaurantInfo info in restaurantList)
                    {
                        //count++;
                        if (info.Id == id)
                        {
                            return info;
                        }

                    }
                
            }
            return null;
        }
        public void SaveRestaurant(RestaurantInfo restInfo)
        {
            string xmlFile = HttpContext.Current.Server.MapPath("~/App_Data/restaurant_review.xml");
            restaurant_review allRestaurants = GetRestaurantsFromXml();
            //Get restaurant by id and save it on xml file 
            restaurant_reviewRestaurant restToUpdate = allRestaurants.restaurant[restInfo.Id];
            if (restToUpdate != null)
            {
                restToUpdate.name= restInfo.Name;
                restToUpdate.reviews.review.summary = restInfo.Summary;
                restToUpdate.reviews.review.rating.Value = restInfo.Rating.ToString();
                restToUpdate.address.StreetAddress = restInfo.Location.Street;
                restToUpdate.address.city = restInfo.Location.City;
                restToUpdate.address.ProvinceState = (ProvinceType)Enum.Parse(typeof(ProvinceType), restInfo.Location.Province, true);
                restToUpdate.address.PostalZipCode = restInfo.Location.PostalCode;
                using (FileStream xs = new FileStream(xmlFile, FileMode.Create))
                    {
                        XmlSerializer serializer = new XmlSerializer(typeof(restaurant_review));
                        serializer.Serialize(xs, allRestaurants);
                    }
            }

        }

        public restaurant_review GetRestaurantsFromXml()  //this method makes the xml readable as an object
        {
            restaurant_review listOfRestaurants = null;

            string xmlFile = HttpContext.Current.Server.MapPath("~/App_Data/restaurant_review.xml");
            string rs = System.Reflection.Assembly.GetExecutingAssembly().Location;

            //opening the xml file and deserializing it (converting xml file into object)
            using (FileStream xs = new FileStream(xmlFile, FileMode.Open))
            {
                XmlSerializer serializer = new XmlSerializer(typeof(restaurant_review));
                listOfRestaurants = (restaurant_review)serializer.Deserialize(xs);
            }
            return listOfRestaurants;
        }
    }
}
