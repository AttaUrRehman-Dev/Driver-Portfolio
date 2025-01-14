const express = require("express");
const mongoose = require("mongoose");
const cors = require("cors");

// Initialize app and middleware
const app = express();
app.use(express.json());
app.use(cors());

// Connect to MongoDB
mongoose
  .connect("mongodb://localhost:27017/bookingDB", {
    useNewUrlParser: true,
    useUnifiedTopology: true,
  })
  .then(() => console.log("Connected to MongoDB"));

// Define schema and model
const bookingSchema = new mongoose.Schema({
  name: String,
  email: String,
  phone: String,
  pickupAddress: String,
  dropoffAddress: String,
  pickupDate: Date,
  distance: Number,
  cost: String,
});

const Booking = mongoose.model("Booking", bookingSchema);

// Define routes
app.post("/submit", async (req, res) => {
  try {
    const newBooking = new Booking(req.body);
    await newBooking.save();
    res.status(200).send("Booking saved successfully!");
  } catch (error) {
    res.status(500).send("Error saving booking");
  }
});

// Start server
const PORT = 3000;
app.listen(PORT, () =>
  console.log(`Server running on http://localhost:${PORT}`)
);
