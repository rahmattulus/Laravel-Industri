<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <form action="/login" method="post">
        @csrf
        <input type="text" name="username" id="" placeholder="username" required><br><br>
        <input type="password" name="password" id="" placeholder="password" required><br><br>
       
        <button type="submit">Log-In</button>
    </form>
</div>
