using Microsoft.AspNetCore.Authentication.Cookies;
using Microsoft.AspNetCore.Authentication;
using Microsoft.AspNetCore.Identity.Data;
using Microsoft.AspNetCore.Mvc;
using rental.Models;
using System.Security.Claims;

namespace rental.Controllers
{
    public class AccountController : Controller
    {
        private static readonly List<User> _users = new List<User>
        {
            new User { UserId = 1, Username = "qwe", Password = "qwe" },
            new User { UserId = 2, Username = "awd", Password = "awd" }
            // Add more users as needed
        };

        [HttpGet]
        public IActionResult Login()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Login(Models.LoginRequest model)
        {
            var user = _users.FirstOrDefault(u => u.Username == model.Username && u.Password == model.Password);

            if (user != null)
            {
                // Simulate storing authentication state in session or TempData
                TempData["UserId"] = user.UserId;
                TempData["Username"] = user.Username;

                return RedirectToAction("Index", "Home");
            }
            else
            {
                ViewBag.ErrorMessage = "Invalid username or password.";
                return View();
            }
        }

        [HttpGet]
        public IActionResult Register()
        {
            return View();
        }

        [HttpPost]
        public IActionResult Register(Models.RegisterRequest model)
        {
            // Registration logic here
            return RedirectToAction("Login");
        }

        [HttpPost]
        public IActionResult Logout()
        {
            // Clear any authentication-related TempData
            TempData.Remove("UserId");
            TempData.Remove("Username");

            return RedirectToAction("Index", "Home");
        }
    }
}
