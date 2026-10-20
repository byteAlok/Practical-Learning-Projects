var builder = WebApplication.CreateBuilder(args);
builder.Services.AddControllersWithViews();
var app = builder.Build();


//app.MapGet("/", () => "Hello World!");

app.MapControllerRoute(
    name:"default",
    pattern:"{controller=Employee}/{action=Insert}/{id?}"
    );
app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Employee}/{action=Show}/{id?}"
    );
app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Employee}/{action=Update}/{id?}"
    );
app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Employee}/{action=Delete}/{id?}"
    );

app.Run();
