namespace rental
{
    public static class InMemoryUserStore
    {
        public static List<User> Users = new List<User>
        {
            new User { UserId = 1, Username = "qwe", Password = "qwe" }
        };
    }

    public class User
    {
        public int UserId { get; set; }
        public string Username { get; set; }
        public string Password { get; set; }
    }
}
